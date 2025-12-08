<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtilisateurDashboardController extends Controller
{
   public function index(Request $request)
{
    // Vérifier que l'utilisateur est connecté
    if (!Auth::check()) {
        return redirect()->route('utilisateur_login');
    }
    
    $user = Auth::user();
    
    // Vérifie si c'est un admin (vérifie directement le champ role)
    if (isset($user->role) && $user->role === 'admin') {
        return redirect()->route('dashboard');
    }
    
    // Sinon, c'est un utilisateur simple
    return view('utilisateurs.dashboard', [
        'user' => $user,
    ]);
}
}