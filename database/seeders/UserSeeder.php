<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'COMLAN',
            'email' => 'maurices.comlan@gmail.com',
            'password' => Hash::make('Eneam123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'JERE',
            'email' => 'admin@uac.bj',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'jack',
            'email' => 'user@test.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}