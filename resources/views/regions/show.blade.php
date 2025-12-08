@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Détails de la région</h2>

    <div class="card">
        <div class="card-body">
            <h4>{{ $region->nom }}</h4>
            <p><strong>ID :</strong> {{ $region->id }}</p>
            <p><strong>Description :</strong> {{ $region->description ?? 'Aucune description' }}</p>
        </div>
    </div>

    <a href="{{ route('regions.index') }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@endsection
