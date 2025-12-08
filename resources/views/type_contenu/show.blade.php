@extends('layout')

@section('content')
<div class="container">

    <h3>Détails du type de contenu</h3>

    <div class="card p-3">
        <p><strong>ID :</strong> {{ $typeContenu->id }}</p>
        <p><strong>Nom :</strong> {{ $typeContenu->nom }}</p>
        <p><strong>Description :</strong> {{ $typeContenu->description }}</p>
    </div>

    <a href="{{ route('type_contenu.index') }}" class="btn btn-secondary mt-3">Retour</a>

</div>
@endsection
