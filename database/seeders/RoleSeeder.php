<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Désactiver les contraintes
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Vider la table proprement
        DB::table('roles')->truncate();

        // Réactiver les contraintes
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

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
        $this->command->info('Rôles insérés avec succès.');
    }
}