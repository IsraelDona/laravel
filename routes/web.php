<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\TypeMediaController;
use App\Http\Controllers\TypeContenuController;
use App\Http\Controllers\ContenuController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Auth\SimpleAuthController;
use App\Http\Controllers\UtilisateurDashboardController;

// ========================
// ROUTES PUBLIQUES
// ========================
Route::get('/', function () {
    return redirect()->route('front.accueil');
});

// ========================
// ROUTES FRONTEND PUBLIQUES
// ========================
Route::prefix('front')->name('front.')->group(function () {
    Route::get('/accueil', [FrontController::class, 'accueil'])->name('accueil');
    Route::get('/contenus', [FrontController::class, 'contenus'])->name('contenus');
    Route::get('/regions', [FrontController::class, 'regions'])->name('regions');
    Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
});

// ========================
// AUTH UTILISATEURS SIMPLES (PUBLIC)
// ========================
Route::middleware('guest')->group(function () {
    // GET - Afficher le formulaire de connexion utilisateur
    Route::get('/connexion', [SimpleAuthController::class, 'showLogin'])->name('utilisateur_login');
    
    // POST - Traiter la connexion utilisateur
    Route::post('/connexion', [SimpleAuthController::class, 'login'])->name('utilisateur_login.post');
    
    // GET - Afficher le formulaire d'inscription utilisateur
    Route::get('/inscription', [SimpleAuthController::class, 'showRegister'])->name('utilisateur_register');
    
    // POST - Traiter l'inscription utilisateur
    Route::post('/inscription', [SimpleAuthController::class, 'register'])->name('utilisateur_register.post');
});

// ========================
// DASHBOARD UTILISATEUR SIMPLE (PROTÉGÉ)
// ========================
Route::middleware(['auth'])->group(function () {
    Route::get('/utilisateurs/dashboard', [UtilisateurDashboardController::class, 'index'])
        ->name('utilisateurs.dashboard');
    
    // Déconnexion
    Route::post('/deconnexion', [SimpleAuthController::class, 'logout'])
        ->name('utilisateurs.logout');
});

// ========================
// LOGIN ADMIN (BREEZE) - PUBLIC
// ========================
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

// ========================
// DASHBOARD ADMIN (PROTÉGÉ)
// ========================
Route::middleware(['auth'])->group(function () {
    // Dashboard admin - VÉRIFICATION DU RÔLE
    Route::get('/dashboard', function () {
        $user = Auth::user();
        
        // Si c'est un utilisateur simple (pas admin), redirige vers son dashboard
        if (!isset($user->role) || $user->role !== 'admin') {
            return redirect()->route('utilisateurs.dashboard');
        }
        
        // Si c'est un admin, affiche le dashboard admin
        return view('dashboard');
    })->name('dashboard');
    
    // Profil admin (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // CRUD ADMIN - TEMPORAIREMENT ACCESSIBLE À TOUS LES CONNECTÉS
    Route::resource('regions', RegionController::class);
    Route::resource('langues', LangueController::class);
    Route::resource('utilisateurs', UtilisateurController::class);
    Route::resource('type_media', TypeMediaController::class);
    Route::resource('type_contenu', TypeContenuController::class);
    Route::resource('contenus', ContenuController::class);
    Route::resource('medias', MediaController::class);
});




// Routes Breeze (auth.php)
require __DIR__ . '/auth.php';