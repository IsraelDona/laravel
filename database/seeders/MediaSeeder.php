<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Media;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        $medias = [
            [
                'fichier' => 'images/vodoun.jpg',
                'titre' => 'Vodoun Image',
                'description' => 'Illustration rituelle vodoun.',
                'type_media_id' => 1,
                'contenu_id' => 1,
                'region_id' => 1,
            ],
            [
                'fichier' => 'videos/zangbeto.mp4',
                'titre' => 'Zangbeto Vidéo',
                'description' => 'Danse traditionnelle Zangbeto.',
                'type_media_id' => 2,
                'contenu_id' => 2,
                'region_id' => 2,
            ],
        ];

        foreach ($medias as $m) {
            Media::updateOrCreate(
                ['fichier' => $m['fichier']], // critère unique raisonnable
                $m
            );
        }
    }
}
