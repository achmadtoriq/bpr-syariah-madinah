<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\ImapService;
use App\Models\EmailAttachmentModel;
use App\Models\InboxEmailModel;
use Exception;

class InboxController extends BaseController
{
    protected InboxEmailModel $emailModel;
    protected EmailAttachmentModel $attachmentModel;

    public function __construct()
    {
        $this->emailModel      = new InboxEmailModel();
        $this->attachmentModel = new EmailAttachmentModel();
    }

    public function index()
    {
        $search = $this->request->getGet('q');

        $query = $this->emailModel->orderBy('received_at', 'DESC');

        if (!empty($search)) {
            $query->groupStart()
                  ->like('subject', $search)
                  ->orLike('sender_name', $search)
                  ->orLike('sender_email', $search)
                  ->orLike('body_text', $search)
                  ->groupEnd();
        }

        $emails = $query->paginate(15);
        $pager  = $this->emailModel->pager;

        $totalInbox      = $this->emailModel->countAllResults(false);
        $unreadCount     = $this->emailModel->where('is_read', 0)->countAllResults();
        $attachmentCount = $this->emailModel->where('has_attachments', 1)->countAllResults();

        $title = 'Inbox Email Office';

        return $this->render_dashboard('dashboard/inbox/index', compact(
            'emails',
            'pager',
            'search',
            'totalInbox',
            'unreadCount',
            'attachmentCount',
            'title'
        ));
    }

    public function detail($id)
    {
        $email = $this->emailModel->find($id);

        if (!$email) {
            return redirect()->to(base_url('inbox'))->with('error', 'Email tidak ditemukan.');
        }

        // Mark as read
        if ($email['is_read'] == 0) {
            $this->emailModel->update($id, ['is_read' => 1]);
            $email['is_read'] = 1;
        }

        $attachments = $this->attachmentModel->where('email_id', $id)->findAll();
        $title       = 'Detail Email: ' . $email['subject'];

        return $this->render_dashboard('dashboard/inbox/detail', compact('email', 'attachments', 'title'));
    }

    public function downloadAttachment($attachmentId)
    {
        $attachment = $this->attachmentModel->find($attachmentId);

        if (!$attachment) {
            return redirect()->back()->with('error', 'File lampiran tidak ditemukan.');
        }

        $filePath = WRITEPATH . 'uploads/email_attachments/' . $attachment['saved_name'];

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'Berkas fisik tidak ditemukan di server.');
        }

        return $this->response->download($filePath, null)->setFileName($attachment['filename']);
    }

    public function sync()
    {
        try {
            $service = new ImapService();
            $result  = $service->syncEmails(50);

            $msg = "Sinkronisasi berhasil! {$result['added']} email baru ditambahkan ({$result['skipped']} email terlewati).";

            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'status'  => 'success',
                    'message' => $msg,
                    'result'  => $result
                ]);
            }

            return redirect()->to(base_url('inbox'))->with('success', $msg);
        } catch (Exception $e) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => $e->getMessage()
                ]);
            }

            return redirect()->to(base_url('inbox'))->with('error', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $email = $this->emailModel->find($id);

        if (!$email) {
            return redirect()->to(base_url('inbox'))->with('error', 'Email tidak ditemukan.');
        }

        // Try to move email to Trash in Webmail Server
        try {
            $service = new ImapService();
            $service->moveEmailToTrash($email['msg_uid'] ?? null, $email['message_id'] ?? null);
        } catch (Exception $e) {
            log_message('error', 'Gagal sync hapus ke Trash Webmail: ' . $e->getMessage());
        }

        // Delete attachment files physically
        $attachments = $this->attachmentModel->where('email_id', $id)->findAll();
        foreach ($attachments as $att) {
            $filePath = WRITEPATH . 'uploads/email_attachments/' . $att['saved_name'];
            if (file_exists($filePath)) {
                @unlink($filePath);
            }
        }

        // Delete records from database
        $this->attachmentModel->where('email_id', $id)->delete();
        $this->emailModel->delete($id);

        $msg = 'Email dan lampiran berhasil dihapus dari dashboard serta dipindahkan ke folder Trash di Webmail.';

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => $msg
            ]);
        }

        return redirect()->to(base_url('inbox'))->with('success', $msg);
    }

    public function downloadBulkAttachments()
    {
        $idsParam = $this->request->getPost('email_ids') ?? $this->request->getGet('ids');

        $emailIds = [];
        if (is_array($idsParam)) {
            $emailIds = array_map('intval', $idsParam);
        } elseif (is_string($idsParam) && !empty($idsParam)) {
            $emailIds = array_map('intval', explode(',', $idsParam));
        }

        if (!empty($emailIds)) {
            $attachments = $this->attachmentModel->whereIn('email_id', $emailIds)->findAll();
        } else {
            $attachments = $this->attachmentModel->findAll();
        }

        if (empty($attachments)) {
            return redirect()->back()->with('error', 'Tidak ada berkas lampiran yang tersedia untuk diunduh.');
        }

        $zip = new \ZipArchive();
        $zipFileName = 'bulk_lampiran_' . date('Ymd_His') . '.zip';
        $zipFilePath = WRITEPATH . 'uploads/email_attachments/' . $zipFileName;

        if ($zip->open($zipFilePath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) !== true) {
            return redirect()->back()->with('error', 'Gagal membuat file ZIP di server.');
        }

        $addedCount = 0;
        $usedNames  = [];

        foreach ($attachments as $att) {
            $filePath = WRITEPATH . 'uploads/email_attachments/' . $att['saved_name'];
            if (file_exists($filePath)) {
                $filename = $att['filename'];
                if (isset($usedNames[$filename])) {
                    $usedNames[$filename]++;
                    $info = pathinfo($filename);
                    $filename = $info['filename'] . '_' . $usedNames[$filename] . (!empty($info['extension']) ? '.' . $info['extension'] : '');
                } else {
                    $usedNames[$filename] = 1;
                }

                $zip->addFile($filePath, $filename);
                $addedCount++;
            }
        }

        $zip->close();

        if ($addedCount === 0 || !file_exists($zipFilePath)) {
            return redirect()->back()->with('error', 'Semua berkas fisik lampiran tidak ditemukan pada server.');
        }

        return $this->response->download($zipFilePath, null)->setFileName('lampiran_email_bulk_' . date('Y-m-d') . '.zip');
    }
}
