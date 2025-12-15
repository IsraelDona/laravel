<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Démarrage des services de l'application.
     */
    public function boot(): void
    {
        // Forcer HTTPS en production
        if (env('APP_ENV') === 'production' || env('APP_ENV') === 'staging') {
            URL::forceScheme('https');
        }
        
        // Ou toujours utiliser HTTPS sur Railway :
        URL::forceScheme('https');
    }
}