<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // User::factory(10)->create();

        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
            'alamat' => 'Jl. Test No.1',
            'no_hp' => '08123456789',
        ]);

=======
>>>>>>> 8f8001d62e0ee4025f44db1b0e11eb82d494c1cc
        $this->call([
            AdminUserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
