<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Utilise UNIQUEMENT User maintenant
use Illuminate\Http\Request;

class SimpleAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.utilisateur_login');
    }
    
    public function showRegister()
    {
        return view('auth.utilisateur_register');
    }

    public function register(Request $request)
    {
       $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Création de l'utilisateur
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user', // Valeur par défaut
    ]);

    // Connexion automatique
    Auth::login($user);

    return redirect()->route('utilisateurs.das')->with('success', 'Inscription réussie !');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Chercher UNIQUEMENT dans la table users
    $user = User::where('email', $request->email)->first();
    
    if ($user && Hash::check($request->password, $user->password)) {
        Auth::login($user);
        $request->session()->regenerate();
        
        // Redirige selon le rôle - UTILISE isAdmin()
        if ($user->isAdmin()) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('utilisateurs.dashboard');
        }
    }

    // Échec
    return back()->withErrors([
        'email' => 'Les identifiants sont incorrects.',
    ])->onlyInput('email');
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('utilisateur_login');
    }
}