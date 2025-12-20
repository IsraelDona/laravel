@extends('frontend.layout')

@section('title', 'Contenus - Culture Bénin')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-green-900 mb-2">Contenus Culturels</h1>
    <p class="text-gray-600 mb-6">Découvrez notre collection de contenus</p>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($contenus as $contenu)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="h-48 bg-gray-200 flex items-center justify-center">
                @php $media = $contenu->medias->first(); @endphp
                @if($media && !empty($media->chemin))
                    <img src="{{ asset($media->chemin) }}" alt="{{ $contenu->titre }}" class="object-cover w-full h-48">
                @else
                    <img src="{{ asset('/adminLTE/img/default-150x150.png') }}" alt="placeholder" class="object-cover w-full h-48">
                @endif
            </div>
            <div class="p-6">
                <h3 class="font-bold text-lg text-green-800 mb-2">{{ $contenu->titre }}</h3>
                <p class="text-gray-600 mb-4">{{ \Illuminate\Support\Str::limit($contenu->description ?? strip_tags($contenu->contenu_html), 120) }}</p>
                <p class="text-sm text-gray-500 mb-3">Petite description</p>
                <a href="{{ route('front.contenu.pay', $contenu->id) }}" class="text-green-700 hover:text-green-900 font-medium">
                    Lire la suite →
                </a>
            </div>
        </div>
        @empty
            <p class="text-gray-600">Aucun contenu disponible pour le moment.</p>
        @endforelse
    </div>
</div>
@endsection