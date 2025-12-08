<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeMedia;

class TypeMediaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nom_type' => 'Image', 'description' => 'Fichiers image (jpg, png...)'],
            ['nom_type' => 'Vidéo', 'description' => 'Fichiers vidéo (mp4...)'],
            ['nom_type' => 'Audio', 'description' => 'Fichiers audio (mp3...)'],
        ];

        foreach ($data as $item) {
            TypeMedia::updateOrCreate(
                ['nom_type' => $item['nom_type']], // critère unique
                $item
            );
        }
    }
}
