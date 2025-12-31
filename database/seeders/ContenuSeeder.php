<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contenu;
use App\Models\Region;
use App\Models\TypeContenu;
use App\Models\Langue;
use App\Models\User;

class ContenuSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $langue = Langue::where('code_langue', 'fr')->first();
        $type = TypeContenu::where('nom', 'Article')->first();
        $region1 = Region::where('nom', 'Atlantique')->first();
        $region2 = Region::where('nom', 'Borgou')->first();

        if (!$user || !$langue || !$type || !$region1 || !$region2) {
            return;
        }

        Contenu::updateOrCreate(
            ['titre' => 'Culture Vodoun'],
            [
                'description' => 'Présentation des rites vodoun.',
                'contenu_html' => '<p>Texte example</p>',
                'region_id' => $region1->id,
                'type_contenu_id' => $type->id,
                'langue_id' => $langue->id,
                'user_id' => $user->id,
            ]
        );

        Contenu::updateOrCreate(
            ['titre' => 'Danse Zangbéto'],
            [
                'description' => 'Description de la danse.',
                'contenu_html' => '<p>Description ici</p>',
                'region_id' => $region2->id,
                'type_contenu_id' => $type->id,
                'langue_id' => $langue->id,
                'user_id' => $user->id,
            ]
        );
    }
}
