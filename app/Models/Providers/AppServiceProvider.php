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
       
            if (config('app.env') === 'production') {
                URL::forceScheme('https');
            }
    }
}