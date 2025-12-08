<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeContenu;

class TypeContenuSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nom' => 'Article', 'description' => 'Texte long'],
            ['nom' => 'Vidéo', 'description' => 'Contenu vidéo'],
            ['nom' => 'Audio', 'description' => 'Enregistrement audio']
        ];

        foreach ($data as $item) {
            TypeContenu::updateOrCreate(
                ['nom' => $item['nom']],
                $item
            );
        }
    }
}
