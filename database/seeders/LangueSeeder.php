<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Langue; // Assurez-vous d'importer votre modèle Langue

class LangueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $langues = [
            // Langue par défaut pour l'administration et les contenus
            ['code_langue' => 'fr', 'nom_langue' => 'Français', 'description' => 'Langue officielle pour l\'administration.'],
            
            // Autres exemples de langues béninoises
            ['code_langue' => 'fon', 'nom_langue' => 'Fon', 'description' => 'Langue parlée dans le sud du Bénin.'],
            ['code_langue' => 'yor', 'nom_langue' => 'Yoruba', 'description' => 'Langue parlée dans le sud-est et le centre.'],
            ['code_langue' => 'bar', 'nom_langue' => 'Bariba', 'description' => 'Langue parlée dans le nord du Bénin.'],
        ];

        foreach ($langues as $langue) {
            // Utilisation correcte de la méthode updateOrCreate
            Langue::updateOrCreate(
                ['code_langue' => $langue['code_langue']],
                [
                    'nom_langue' => $langue['nom_langue'],
                    'description' => $langue['description'],
                ]
            );
        }

        $this->command->info('Langues par défaut insérées avec succès.');
    }
}