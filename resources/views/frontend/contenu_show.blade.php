@extends('frontend.layout')

@section('title', $contenu->titre)

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-green-900 mb-4">{{ $contenu->titre }}</h1>

    <div class="mb-6">
        <img src="{{ asset($contenu->medias->first()->chemin ?? '/adminLTE/img/default-150x150.png') }}" alt="{{ $contenu->titre }}" class="w-full h-64 object-cover rounded">
    </div>

    <div class="prose max-w-none">
        {!! $contenu->contenu_html ?? nl2br(e($contenu->description)) !!}
    </div>

    <a href="{{ route('front.contenus') }}" class="inline-block mt-6 text-green-700">Retour aux contenus</a>
</div>
@endsection
