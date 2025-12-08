@extends('layout')

@section('content')
<div class="container">

    <h2>Détails du Média</h2>

    <div class="card p-3">

        <img src="{{ asset($media->fichier) }}" width="300" class="mb-3">

        <h4>{{ $media->titre }}</h4>
        <p>{{ $media->description }}</p>

        <p><strong>Type : </strong> {{ $media->typeMedia->nom_type }}</p>
        <p><strong>Contenu : </strong> {{ $media->contenu->titre ?? '—' }}</p>
        <p><strong>Région : </strong> {{ $media->region->nom ?? '—' }}</p>

        <a href="{{ route('medias.index') }}" class="btn btn-secondary mt-3">
            <i class="fas fa-arrow-left"></i> Retour
        </a>

    </div>

</div>
@endsection
