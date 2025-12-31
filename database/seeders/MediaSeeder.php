<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Media;
use App\Models\Contenu;
use App\Models\TypeMedia;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        $image = TypeMedia::where('nom_type', 'Image')->first();
        $video = TypeMedia::where('nom_type', 'Vidéo')->first();

        $vodoun = Contenu::where('titre', 'Culture Vodoun')->first();
        $zangbeto = Contenu::where('titre', 'Danse Zangbéto')->first();

        if ($image && $vodoun) {
            Media::updateOrCreate(
                ['chemin' => 'images/vodoun.jpg'],
                [
                    'contenu_id' => $vodoun->id,
                    'type_media_id' => $image->id,
                ]
            );
        }

        if ($video && $zangbeto) {
            Media::updateOrCreate(
                ['chemin' => 'videos/zangbeto.mp4'],
                [
                    'contenu_id' => $zangbeto->id,
                    'type_media_id' => $video->id,
                ]
            );
        }
    }
}
