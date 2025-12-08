<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $regions = [
            ['nom' => 'Atlantique', 'description' => 'Région du sud'],
            ['nom' => 'Borgou', 'description' => 'Région du nord'],
            ['nom' => 'Mono', 'description' => 'Région de l’ouest'],
        ];

        foreach ($regions as $r) {
            Region::updateOrCreate(
                ['nom' => $r['nom']], // condition d’unicité
                $r                      // valeurs à mettre à jour si existe
            );
        }
    }
}
