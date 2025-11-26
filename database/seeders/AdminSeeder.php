<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat 1 Akun Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@cafe.com',
            'password' => Hash::make('password123'), // Password aman
            'role' => 'admin', // Role diset sebagai admin
        ]);

        // Membuat 1 Akun User Biasa (untuk tes)
        User::create([
            'name' => 'Pengguna Biasa',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}