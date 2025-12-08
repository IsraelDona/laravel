<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SimpleUser
{
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifie que c'est bien un Utilisateur (pas Admin)
        if (Auth::check() && !(Auth::user() instanceof \App\Models\Utilisateur)) {
            abort(403, 'Accès réservé aux utilisateurs simples');
        }

        return $next($request);
    }
}
