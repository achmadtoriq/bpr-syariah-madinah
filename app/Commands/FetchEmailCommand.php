<?php

namespace App\Commands;

use App\Libraries\ImapService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Exception;

class FetchEmailCommand extends BaseCommand
{
    protected $group       = 'Email';
    protected $name        = 'email:fetch';
    protected $description = 'Sinkronisasi inbox email dari mail server IMAP ke database lokal';
    protected $usage       = 'email:fetch [limit]';
    protected $arguments   = [
        'limit' => 'Jumlah maksimal email yang diperiksa (default: 50)'
    ];

    public function run(array $params)
    {
        CLI::write('Memulai sinkronisasi email IMAP Webmail...', 'yellow');

        $limit = isset($params[0]) ? (int) $params[0] : 50;

        try {
            $service = new ImapService();
            $result  = $service->syncEmails($limit);

            CLI::write("Sinkronisasi Selesai!", 'green');
            CLI::write("Total email diperiksa : {$result['total']}");
            CLI::write("Email baru ditambahkan: {$result['added']}");
            CLI::write("Email lama terlewati   : {$result['skipped']}");
        } catch (Exception $e) {
            CLI::error("Gagal sinkronisasi email: " . $e->getMessage());
        }
    }
}
