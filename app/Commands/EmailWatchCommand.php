<?php

namespace App\Commands;

use App\Libraries\ImapService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Exception;

class EmailWatchCommand extends BaseCommand
{
    protected $group       = 'Email';
    protected $name        = 'email:watch';
    protected $description = 'Menjalankan daemon background worker sinkronisasi email secara terus-menerus (seperti Laravel queue:work)';
    protected $usage       = 'email:watch [interval_detik]';
    protected $arguments   = [
        'interval' => 'Interval jeda waktu sinkronisasi dalam detik (default: 30)'
    ];

    public function run(array $params)
    {
        $interval = isset($params[0]) ? max(5, (int) $params[0]) : 30;

        CLI::write("==================================================", 'green');
        CLI::write("   BPR SYARIAH MADINAH - EMAIL BACKGROUND WORKER  ", 'white', 'bg_green');
        CLI::write("==================================================", 'green');
        CLI::write("Worker aktif! Melakukan sync email setiap {$interval} detik.", 'yellow');
        CLI::write("Tekan [Ctrl + C] untuk menghentikan worker.\n", 'slate');

        $imapService = new ImapService();
        $counter = 0;

        while (true) {
            $counter++;
            $timeStr = date('H:i:s');

            try {
                $result = $imapService->syncEmails(50);
                
                if ($result['added'] > 0) {
                    CLI::write("[{$timeStr}] #{$counter} SUCCESS: {$result['added']} email baru berhasil ditarik!", 'green');
                } else {
                    CLI::write("[{$timeStr}] #{$counter} IDLE: Tidak ada email baru ({$result['skipped']} email diperiksa).", 'light_gray');
                }
            } catch (Exception $e) {
                CLI::write("[{$timeStr}] #{$counter} ERROR: " . $e->getMessage(), 'red');
            }

            sleep($interval);
        }
    }
}
