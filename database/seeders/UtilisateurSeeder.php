<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;

class UtilisateurSeeder extends Seeder
{
    public function run(): void
    {
        $utilisateurs = [
            [
                'nom' => 'BOSS ',
                'prenom' => 'ISRAEL',
                'email' => 'boss.isra@example.com',
                'statut' => 'actif',
                'date_naissance' => '1990-05-15',
                'date_inscription' => '2024-01-10',
                'mot_de_passe' => Hash::make('password123'),
                'photo' => 'photos/israel.jpg',
                'id_role' => 1,
                'id_langue' => 2,
            ],
            [
                'nom' => 'BOSS',
                'prenom' => 'Jeremie',
                'email' => 'jeremie.boss@example.com',
                'statut' => 'actif',
                'date_naissance' => '1988-08-22',
                'date_inscription' => '2024-01-15',
                'mot_de_passe' => Hash::make('password123'),
                'photo' => 'photos/jeremie.jpg',
                'id_role' => 1,
                'id_langue' => 2,
            ],
    ];

        foreach ($utilisateurs as $utilisateur) {
            Utilisateur::updateOrCreate(
                ['email' => $utilisateur['email']],
                $utilisateur
            );
        }
    }
}
