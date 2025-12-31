<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeMedia;

class TypeMediaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nom_type' => 'Image', 'description' => 'Fichiers image'],
            ['nom_type' => 'Vidéo', 'description' => 'Fichiers vidéo'],
            ['nom_type' => 'Audio', 'description' => 'Fichiers audio'],
        ];

        foreach ($data as $item) {
            TypeMedia::updateOrCreate(
                ['nom_type' => $item['nom_type']],
                $item
            );
        }
    }
}
