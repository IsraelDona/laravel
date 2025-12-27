<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
        LangueSeeder::class,
        RegionSeeder::class,
        TypeContenuSeeder::class,
        TypeMediaSeeder::class,

        UserSeeder::class,
        UtilisateurSeeder::class,

        ContenuSeeder::class,
        MediaSeeder::class,
        CommentaireSeeder::class,
        ]);
    }
}
