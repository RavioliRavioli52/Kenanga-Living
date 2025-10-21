<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Exception;

class TestDbConnection extends Command
{
    /**
     * Nama dan signature dari command.
     *
     * @var string
     */
    protected $signature = 'test:dbconnection';

    /**
     * Deskripsi command.
     *
     * @var string
     */
    protected $description = 'Menguji koneksi ke database Laravel';

    /**
     * Jalankan command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('🔍 Menguji koneksi database...');

        try {
            // Coba koneksi ke database default
            DB::connection()->getPdo();

            $databaseName = DB::connection()->getDatabaseName();

            $this->info('✅ Koneksi ke database berhasil!');
            $this->info('📦 Nama Database: ' . $databaseName);
        } catch (Exception $e) {
            $this->error('❌ Gagal terkoneksi ke database!');
            $this->error('Pesan error: ' . $e->getMessage());
        }

        return 0;
    }
}