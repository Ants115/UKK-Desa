<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Marchelin',
            'email' => 'ekamarchel@gmail.com',
            'password' => Hash::make('marchelin123'),
            'role' => 'admin',
        ]);
    }
}