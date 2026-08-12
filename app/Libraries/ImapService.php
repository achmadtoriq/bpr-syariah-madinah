<?php

namespace App\Libraries;

use App\Models\EmailAttachmentModel;
use App\Models\InboxEmailModel;
use Webklex\PHPIMAP\ClientManager;
use Exception;

class ImapService
{
    protected InboxEmailModel $emailModel;
    protected EmailAttachmentModel $attachmentModel;
    protected string $attachmentPath;

    public function __construct()
    {
        $this->emailModel      = new InboxEmailModel();
        $this->attachmentModel = new EmailAttachmentModel();
        $this->attachmentPath  = WRITEPATH . 'uploads/email_attachments/';

        if (!is_dir($this->attachmentPath)) {
            mkdir($this->attachmentPath, 0755, true);
        }
    }

    /**
     * Connect to IMAP server and sync emails to database
     *
     * @param int $limit Maximum number of emails to fetch per sync
     * @return array Summary of sync results (added, skipped, errors)
     */
    public function syncEmails(int $limit = 50): array
    {
        $host         = env('email.imap.host', '');
        $port         = (int) env('email.imap.port', 993);
        $encryption   = env('email.imap.encryption', 'ssl');
        $username     = env('email.imap.username', '');
        $password     = env('email.imap.password', '');
        $validateCert = filter_var(env('email.imap.validate_cert', false), FILTER_VALIDATE_BOOLEAN);

        if (empty($host) || empty($username) || empty($password) || $username === 'info@domainkantor.com') {
            throw new Exception("Konfigurasi IMAP belum diatur di file .env. Silakan lengkapi email.imap.host, email.imap.username, dan email.imap.password.");
        }

        $clientManager = new ClientManager();
        $makeConfig = function($targetHost) use ($clientManager, $port, $encryption, $validateCert, $username, $password) {
            return $clientManager->make([
                'host'          => $targetHost,
                'port'          => $port,
                'encryption'    => $encryption === 'false' ? false : $encryption,
                'validate_cert' => $validateCert,
                'username'      => $username,
                'password'      => $password,
                'protocol'      => 'imap'
            ]);
        };

        $client = $makeConfig($host);

        try {
            $client->connect();
        } catch (Exception $e) {
            // Try fallback to server IP 101.50.1.94 if domain host fails
            if ($host !== '101.50.1.94') {
                try {
                    $client = $makeConfig('101.50.1.94');
                    $client->connect();
                } catch (Exception $fallbackEx) {
                    throw new Exception("Gagal terhubung ke Mail Server IMAP ({$host}:{$port} / 101.50.1.94): " . $e->getMessage());
                }
            } else {
                throw new Exception("Gagal terhubung ke Mail Server IMAP ({$host}:{$port}): " . $e->getMessage());
            }
        }

        /** @var \Webklex\PHPIMAP\Folder $folder */
        $folder = $client->getFolder('INBOX');
        if (!$folder) {
            throw new Exception("Folder INBOX tidak ditemukan pada server email.");
        }

        // Fetch messages sorted descending by date
        $messages = $folder->messages()->all()->setFetchOrder("desc")->limit($limit)->get();

        $addedCount   = 0;
        $skippedCount = 0;

        foreach ($messages as $message) {
            $uid       = (string) $message->getUid();
            $messageId = (string) $message->getMessageId();

            // Check if email already exists in local DB
            $existing = null;
            if (!empty($messageId)) {
                $existing = $this->emailModel->where('message_id', $messageId)->first();
            }
            if (!$existing && !empty($uid)) {
                $existing = $this->emailModel->where('msg_uid', $uid)->first();
            }

            if ($existing) {
                $skippedCount++;
                continue;
            }

            // Extract Sender
            $fromAddresses = $message->getFrom();
            $senderName    = 'Unknown Sender';
            $senderEmail   = 'unknown@domain.com';

            if (!empty($fromAddresses) && isset($fromAddresses[0])) {
                $from        = $fromAddresses[0];
                $senderName  = (string) ($from->personal ?: $from->mail);
                $senderEmail = (string) $from->mail;
            }

            // Extract Date safely
            $dateAttr = $message->getDate();
            $receivedAt = date('Y-m-d H:i:s');
            if ($dateAttr) {
                try {
                    if (is_object($dateAttr) && method_exists($dateAttr, 'toDate')) {
                        $receivedAt = $dateAttr->toDate()->format('Y-m-d H:i:s');
                    } else {
                        $receivedAt = date('Y-m-d H:i:s', strtotime((string) $dateAttr));
                    }
                } catch (\Throwable $t) {
                    $receivedAt = date('Y-m-d H:i:s', strtotime((string) $dateAttr));
                }
            }

            // Extract Content safely
            $subject   = (string) ($message->getSubject() ?? '(Tanpa Subjek)');
            $textBody  = (string) ($message->getTextBody() ?? '');
            $htmlBody  = (string) ($message->getHTMLBody() ?? '');

            $hasAttachments = $message->hasAttachments() ? 1 : 0;

            $emailData = [
                'msg_uid'         => $uid,
                'message_id'      => $messageId,
                'sender_name'     => $senderName,
                'sender_email'    => $senderEmail,
                'subject'         => $subject,
                'body_text'       => $textBody,
                'body_html'       => $htmlBody,
                'has_attachments' => $hasAttachments,
                'is_read'         => 0,
                'received_at'     => $receivedAt,
            ];

            $emailId = $this->emailModel->insert($emailData);

            // Process Attachments
            if ($emailId && $hasAttachments) {
                $attachments = $message->getAttachments();
                foreach ($attachments as $attachment) {
                    $originalName = $attachment->getName() ?: 'attachment_' . time();
                    $cleanName    = preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $originalName);
                    $savedName    = time() . '_' . uniqid() . '_' . $cleanName;

                    try {
                        $attachment->save($this->attachmentPath, $savedName);

                        $this->attachmentModel->insert([
                            'email_id'   => $emailId,
                            'filename'   => $originalName,
                            'saved_name' => $savedName,
                            'file_size'  => $attachment->getSize() ?? 0,
                            'mime_type'  => $attachment->getMime() ?? 'application/octet-stream',
                            'created_at' => date('Y-m-d H:i:s'),
                        ]);
                    } catch (Exception $attEx) {
                        log_message('error', 'Gagal menyimpan attachment: ' . $attEx->getMessage());
                    }
                }
            }

            $addedCount++;
        }

        $client->disconnect();

        return [
            'status'  => 'success',
            'added'   => $addedCount,
            'skipped' => $skippedCount,
            'total'   => count($messages),
        ];
    }

    /**
     * Move email message to Trash folder on Remote Webmail Server
     *
     * @param string|null $msgUid
     * @param string|null $messageId
     * @return bool
     */
    public function moveEmailToTrash(?string $msgUid, ?string $messageId): bool
    {
        $host         = env('email.imap.host', '101.50.1.94');
        $port         = (int) env('email.imap.port', 993);
        $encryption   = env('email.imap.encryption', 'ssl');
        $username     = env('email.imap.username', '');
        $password     = env('email.imap.password', '');
        $validateCert = filter_var(env('email.imap.validate_cert', false), FILTER_VALIDATE_BOOLEAN);

        if (empty($username) || empty($password)) {
            return false;
        }

        $clientManager = new ClientManager();
        $makeConfig = function($targetHost) use ($clientManager, $port, $encryption, $validateCert, $username, $password) {
            return $clientManager->make([
                'host'          => $targetHost,
                'port'          => $port,
                'encryption'    => $encryption === 'false' ? false : $encryption,
                'validate_cert' => $validateCert,
                'username'      => $username,
                'password'      => $password,
                'protocol'      => 'imap'
            ]);
        };

        try {
            $client = $makeConfig($host);
            try {
                $client->connect();
            } catch (Exception $e) {
                if ($host !== '101.50.1.94') {
                    $client = $makeConfig('101.50.1.94');
                    $client->connect();
                } else {
                    throw $e;
                }
            }

            /** @var \Webklex\PHPIMAP\Folder $folder */
            $folder = $client->getFolder('INBOX');
            if (!$folder) {
                return false;
            }

            // Query message by UID or Message-ID
            $message = null;
            if (!empty($msgUid)) {
                $message = $folder->query()->whereUid($msgUid)->get()->first();
            }
            if (!$message && !empty($messageId)) {
                $message = $folder->query()->whereMessageId($messageId)->get()->first();
            }

            if ($message) {
                $trashPaths = ['INBOX.Trash', 'Trash', 'INBOX/Trash', 'Deleted Items'];
                $targetTrash = 'INBOX.Trash';

                foreach ($trashPaths as $tp) {
                    $tf = $client->getFolder($tp);
                    if ($tf) {
                        $targetTrash = $tp;
                        break;
                    }
                }

                try {
                    $message->move($targetTrash);
                } catch (Exception $moveEx) {
                    $message->delete();
                }

                $client->disconnect();
                return true;
            }

            $client->disconnect();
        } catch (Exception $e) {
            log_message('error', 'Gagal memindahkan email ke Trash Webmail: ' . $e->getMessage());
        }

        return false;
    }
}
