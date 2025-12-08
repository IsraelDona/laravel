<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contenu;

class ContenuSeeder extends Seeder
{
    public function run(): void
    {
        $contenus = [
            [
                'titre' => 'Culture Vodoun',
                'description' => 'Présentation des rites vodoun.',
                'contenu_html' => '<p>Texte example</p>',
                'region_id' => 1,
                'type_contenu_id' => 1,
                'langue_id' => 1,
                'user_id' => 1
            ],
            [
                'titre' => 'Danse Zangbéto',
                'description' => 'Description de la danse.',
                'contenu_html' => '<p>Description ici</p>',
                'region_id' => 2,
                'type_contenu_id' => 1,
                'langue_id' => 1,
                'user_id' => 1
            ],
        ];

        foreach ($contenus as $c) {
            Contenu::updateOrCreate(
                ['titre' => $c['titre']],
                $c
            );
        }
    }
}
