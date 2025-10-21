<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // ganti sesuai kebutuhan
            'role' => 'admin',
            'alamat' => 'Jl. Admin No.1',          // isi sesuai kebutuhan
            'no_hp' => '08123456789',              // isi sesuai kebutuhan
            'email_verified_at' => now(),
        ]);

        $this->command->info('Admin user berhasil dibuat!');
    }
}
