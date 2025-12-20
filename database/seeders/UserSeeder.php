<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate([
            'name' => 'COMLAN',
            'email' => 'maurices.comlan@gmail.com',
            'password' => Hash::make('Eneam123'),
            'role' => 'admin',
        ]);

        User::firstOrCreate([
            'name' => 'JERE',
            'email' => 'admin@uac.bj',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::firstOrCreate([
            'name' => 'jack',
            'email' => 'user@test.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}