@extends('frontend.layout')

@section('title', 'Mon Tableau de Bord')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">
    <!-- En-tête -->
    <div class="bg-gradient-to-r from-green-600 to-yellow-500 rounded-2xl p-8 text-white mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold">Bienvenue, {{ Auth::user()->prenom ?? Auth::user()->name ?? 'Utilisateur' }} !</h1>
                <p class="mt-2">Votre espace personnel pour explorer la culture béninoise</p>
            </div>
            <div class="text-right">
                <div class="text-sm opacity-90">Membre depuis</div>
                <div class="text-lg font-semibold">
                    @if(Auth::user()->date_inscription)
                        {{ \Carbon\Carbon::parse(Auth::user()->date_inscription)->format('d/m/Y') }}
                    @elseif(Auth::user()->created_at)
                        {{ Auth::user()->created_at->format('d/m/Y') }}
                    @else
                        Récemment
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Cartes statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-2xl font-bold text-green-700">0</div>
                    <div class="text-gray-600">Contenus visionnés</div>
                </div>
                <div class="text-green-500">
                    <i class="fas fa-eye text-2xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-2xl font-bold text-yellow-600">0</div>
                    <div class="text-gray-600">Favoris</div>
                </div>
                <div class="text-yellow-500">
                    <i class="fas fa-heart text-2xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-2xl font-bold text-red-600">0</div>
                    <div class="text-gray-600">Commentaires</div>
                </div>
                <div class="text-red-500">
                    <i class="fas fa-comment text-2xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-2xl font-bold text-blue-600">{{ date('H:i') }}</div>
                    <div class="text-gray-600">Heure locale</div>
                </div>
                <div class="text-blue-500">
                    <i class="fas fa-clock text-2xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Sections principales -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Profil -->
        <div class="bg-white rounded-xl shadow p-6 lg:col-span-1">
            <h2 class="text-xl font-bold text-green-800 mb-4">Mon Profil</h2>
            <div class="space-y-4">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                        <span class="text-2xl font-bold text-green-700">
                            {{ strtoupper(substr(Auth::user()->prenom, 0, 1)) }}
                        </span>
                    </div>
                    <div>
                        <h3 class="font-semibold">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</h3>
                        <p class="text-gray-600">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                
                <div class="space-y-3 mt-6">
                    <div>
                        <div class="text-sm text-gray-500">Langue préférée</div>
                        <div class="font-medium">{{ Auth::user()->langue->nom ?? 'Non spécifiée' }}</div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500">Statut</div>
                        <div class="font-medium">
                            <span class="px-2 py-1 rounded-full text-xs {{ Auth::user()->statut == 'actif' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ ucfirst(Auth::user()->statut) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenus recommandés -->
        <div class="bg-white rounded-xl shadow p-6 lg:col-span-2">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-green-800">Contenus recommandés</h2>
                <a href="{{ route('front.contenus') }}" class="text-green-700 hover:text-green-900 font-medium">
                    Voir tout →
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Carte contenu 1 -->
                <div class="border rounded-lg overflow-hidden hover:shadow-lg transition">
                    <div class="h-32 bg-gradient-to-r from-green-400 to-blue-400"></div>
                    <div class="p-4">
                        <h3 class="font-bold text-green-800 text-sm">Danse Tchinkounmè</h3>
                        <p class="text-xs text-gray-600 mt-1">Région Atlantique</p>
                        <div class="mt-3 flex justify-between items-center">
                            <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">Danse</span>
                            <a href="#" class="text-green-700 hover:text-green-900">
                                <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Carte contenu 2 -->
                <div class="border rounded-lg overflow-hidden hover:shadow-lg transition">
                    <div class="h-32 bg-gradient-to-r from-yellow-400 to-red-400"></div>
                    <div class="p-4">
                        <h3 class="font-bold text-green-800 text-sm">Festival des Vodoun</h3>
                        <p class="text-xs text-gray-600 mt-1">Région Zou</p>
                        <div class="mt-3 flex justify-between items-center">
                            <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded">Festival</span>
                            <a href="#" class="text-green-700 hover:text-green-900">
                                <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Carte contenu 3 -->
                <div class="border rounded-lg overflow-hidden hover:shadow-lg transition">
                    <div class="h-32 bg-gradient-to-r from-red-400 to-purple-400"></div>
                    <div class="p-4">
                        <h3 class="font-bold text-green-800 text-sm">Artisanat Somba</h3>
                        <p class="text-xs text-gray-600 mt-1">Région Atacora</p>
                        <div class="mt-3 flex justify-between items-center">
                            <span class="text-xs bg-purple-100 text-purple-800 px-2 py-1 rounded">Artisanat</span>
                            <a href="#" class="text-green-700 hover:text-green-900">
                                <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action rapide -->
    <div class="mt-8 bg-green-50 border border-green-200 rounded-xl p-6">
        <h3 class="font-bold text-green-800 mb-3">Que souhaitez-vous faire ?</h3>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('front.contenus') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                Explorer les contenus
            </a>
            <a href="{{ route('front.regions') }}" class="px-4 py-2 bg-white border border-green-600 text-green-600 rounded-lg hover:bg-green-50">
                Découvrir les régions
            </a>
            <a href="{{ route('front.contact') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                Nous contacter
            </a>
        </div>
    </div>
</div>
@endsection