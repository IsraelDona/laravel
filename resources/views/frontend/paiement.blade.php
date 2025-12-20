@extends('frontend.layout')

@section('title', 'Paiement - Culture Bénin')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-green-900 mb-4">Paiement pour : {{ $contenu->titre }}</h1>

    @if(session('info'))
        <div class="mb-4 text-yellow-700">{{ session('info') }}</div>
    @endif

    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <div class="flex gap-4 items-start">
            <div class="w-32 h-24 bg-gray-100 flex items-center justify-center">
                <img src="{{ asset($contenu->medias->first()->chemin ?? '/adminLTE/img/default-150x150.png') }}" alt="{{ $contenu->titre }}" class="object-cover w-full h-full">
            </div>
            <div>
                <p class="text-gray-700">{{ Str::limit(strip_tags($contenu->contenu_html ?? $contenu->description), 200) }}</p>
                <p class="mt-4 font-semibold">Montant : 2€</p>
            </div>
        </div>
    </div>

    <form action="{{ route('front.contenu.pay.process', $contenu->id) }}" method="POST">
        @csrf
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Payer 2€ (simulation)</button>
        <a href="{{ route('front.contenus') }}" class="ml-4 text-gray-600">Annuler</a>
    </form>
</div>
@endsection
