<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Desa',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Warga
        User::create([
            'name' => 'Warga Satu',
            'email' => 'warga@example.com',
            'password' => Hash::make('password'),
            'role' => 'warga',
        ]);
    }
}