<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Membuat akun kamu sebagai Admin Utama (Perbaikan email)
        User::create([
            'name' => 'Cut Rezky Azaky',
            'email' => 'admin1@gmail.com', 
            'password' => Hash::make('rahasia123'), 
            'role' => 'admin',
        ]);

        // 2. Membuat akun kawanmu sebagai Admin Kedua (Perbaikan email)
        User::create([
            'name' => 'Ahmad Al Faruqi',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('rahasia123'),
            'role' => 'admin',
        ]);

        // 3. Membuat beberapa akun member biasa untuk pajangan di tabel admin
        User::create([
            'name' => 'Abim',
            'email' => 'Biyuabim@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'member',
        ]);

        // PERBAIKAN: Sudah ditambahkan kurung penutup "]);" yang tadi hilang
        User::create([
            'name' => 'Farhan',
            'email' => 'Farhan@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'member',
        ]);

        User::create([
            'name' => 'Faiz',
            'email' => 'Faiz@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'member',
        ]);
    }
}