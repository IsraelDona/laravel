@extends('frontend.layout')

@section('title', 'Contenus - Culture Bénin')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-green-900 mb-2">Contenus Culturels</h1>
    <p class="text-gray-600 mb-6">Découvrez notre collection de contenus</p>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @for($i = 1; $i <= 6; $i++)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="h-48 bg-gray-200 flex items-center justify-center">
                <i class="fas fa-image text-gray-400 text-4xl"></i>
            </div>
            <div class="p-6">
                <h3 class="font-bold text-lg text-green-800 mb-2">Titre du contenu {{ $i }}</h3>
                <p class="text-gray-600 mb-4">Description courte du contenu culturel.</p>
                <a href="#" class="text-green-700 hover:text-green-900 font-medium">
                    Lire la suite →
                </a>
            </div>
        </div>
        @endfor
    </div>
</div>
@endsection