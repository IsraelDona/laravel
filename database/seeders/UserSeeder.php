<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'maurices.comlan@gmail.com'], // clé unique
            [
                'name' => 'COMLAN',
                'password' => Hash::make('Eneam123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@uac.bj'],
            [
                'name' => 'JERE',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@test.com'],
            [
                'name' => 'jack',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ]
        );
    }
}
