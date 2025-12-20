@extends('frontend.layout')

@section('title', 'Contenus - Culture Bénin')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-green-900 mb-2">Contenus Culturels</h1>
    <p class="text-gray-600 mb-6">Découvrez notre collection de contenus</p>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($contenus as $contenu)
        @php $media = $contenu->medias->first(); @endphp
        <div class="bg-white rounded-lg overflow-hidden shadow-lg">
            <div class="relative">
                @if($media && !empty($media->chemin))
                    <img src="{{ asset($media->chemin) }}" alt="{{ $contenu->titre }}" class="w-full h-44 object-cover">
                @else
                    <img src="{{ asset('/adminLTE/img/prod-1.jpg') }}" alt="{{ $contenu->titre }}" class="w-full h-44 object-cover">
                @endif
                <div class="absolute left-0 bottom-0 bg-gradient-to-t from-black/70 to-transparent w-full p-4">
                    <h3 class="text-white text-xl font-bold">{{ $contenu->titre }}</h3>
                </div>
            </div>

            <div class="p-6">
                <div class="flex gap-6 mb-4">
                    <div class="text-center">
                        <div class="text-green-600 text-2xl font-bold">{{ $contenu->medias->count() }}</div>
                        <div class="text-sm text-gray-600">Medias</div>
                    </div>
                    <div class="text-center">
                        <div class="text-yellow-600 text-2xl font-bold">0</div>
                        <div class="text-sm text-gray-600">Sites</div>
                    </div>
                    <div class="text-center">
                        <div class="text-red-600 text-2xl font-bold">0</div>
                        <div class="text-sm text-gray-600">Festivals</div>
                    </div>
                </div>

                <p class="text-gray-700 mb-4">{{ \Illuminate\Support\Str::limit($contenu->description ?? strip_tags($contenu->contenu_html), 140) }}</p>

                <div class="flex items-center justify-between">
                    <a href="{{ route('front.contenu.pay', $contenu->id) }}" class="px-4 py-2 bg-green-600 text-white rounded">Lire la suite</a>
                    <a href="{{ route('front.contenu.show', $contenu->id, ['paid' => 1]) }}" class="text-sm text-gray-500">Voir aperçu</a>
                </div>
            </div>
        </div>
        @empty
            <p class="text-gray-600">Aucun contenu disponible pour le moment.</p>
        @endforelse
    </div>
</div>
@endsection