<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Optionnel : vider la table proprement (compatible PostgreSQL)
        DB::table('roles')->delete();

        $roles = [
            ['nom_role' => 'Admin'],
            ['nom_role' => 'Secrétaire'],
            ['nom_role' => 'Auteur'],
            ['nom_role' => 'Modérateur'],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'nom_role' => $role['nom_role'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
