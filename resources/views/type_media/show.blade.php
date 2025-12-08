@extends('layout')

@section('content')
<div class="container">

    <h3>Détails du type média</h3>

    <div class="card p-3">
        <p><strong>ID :</strong> {{ $typeMedia->id }}</p>
        <p><strong>Nom :</strong> {{ $typeMedia->nom }}</p>
        <p><strong>Extension :</strong> {{ $typeMedia->extension }}</p>
    </div>

    <a href="{{ route('type_media.index') }}" class="btn btn-secondary mt-3">Retour</a>

</div>
@endsection
