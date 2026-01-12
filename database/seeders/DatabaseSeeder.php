<?php

namespace Database\Seeders;

use AddressInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $this->call([
        CategorySeeder::class,
        AdminUserSeeder::class,
        ProductSeeder::class
    ]);
    }
}
