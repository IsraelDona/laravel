@extends('frontend.layout')

@section('title', 'Régions - Culture Bénin')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    <h1 class="text-3xl md:text-4xl font-bold text-green-900 mb-2">Régions du Bénin</h1>
    <p class="text-gray-600 mb-8">Découvrez les 12 régions du Bénin et leurs spécificités culturelles</p>
    
    <!-- Carte des régions -->
    <div class="mb-12">
        <div class="bg-gray-100 rounded-xl p-6">
            <h2 class="text-xl font-bold text-green-800 mb-4">Carte des régions</h2>
            <!-- Ici tu peux ajouter une carte SVG ou image des régions du Bénin -->
            <div class="h-64 bg-gradient-to-r from-green-100 to-yellow-100 rounded-lg flex items-center justify-center">
                <p class="text-gray-500">Carte des régions du Bénin</p>
            </div>
        </div>
    </div>
    
    <!-- Liste des régions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @for($i = 1; $i <= 12; $i++)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">

            <div class="h-48 bg-cover bg-center" 
                  <img src="{{ asset('/adminLTE/img/talon.jpeg') }}" 
                     alt="Culture Bénin" 
                     class="w-full h-full object-cover">
                     
                <div class="h-full bg-gradient-to-t from-black/60 to-transparent flex items-end p-4">
                    <h3 class="text-xl font-bold text-white">Région {{ $i }}</h3>
                </div>
            </div>
            <div class="p-6">
                <div class="flex items-center gap-4 mb-4">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-green-700">{{ rand(5, 20) }}</div>
                        <div class="text-sm text-gray-600">Contenus</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-yellow-600">{{ rand(2, 8) }}</div>
                        <div class="text-sm text-gray-600">Sites</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-red-600">{{ rand(1, 5) }}</div>
                        <div class="text-sm text-gray-600">Festivals</div>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">Découvrez la richesse culturelle de cette région à travers ses traditions, danses et patrimoine.</p>
                <a href="#" class="text-green-700 hover:text-green-900 font-semibold flex items-center gap-2">
                    Explorer cette région <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        @endfor
    </div>
    
    <!-- Statistiques -->
    <div class="mt-12 p-8 bg-gradient-to-r from-green-800 to-yellow-600 rounded-2xl text-white">
        <h2 class="text-2xl font-bold mb-6 text-center">Statistiques des régions</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="text-4xl font-bold">12</div>
                <div class="text-gray-200">Régions</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold">77</div>
                <div class="text-gray-200">Communes</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold">546</div>
                <div class="text-gray-200">Arrondissements</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold">50+</div>
                <div class="text-gray-200">Langues</div>
            </div>
        </div>
    </div>
</div>
@endsection