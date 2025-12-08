@extends('layout')

@section('content')
<div class="container">

    <h3>{{ $contenu->titre }}</h3>

    <p><strong>Région :</strong> {{ $contenu->region->nom }}</p>
    <p><strong>Type :</strong> {{ $contenu->typeContenu->nom }}</p>
    <p><strong>Description :</strong> {{ $contenu->description }}</p>

    <div class="border p-3 mt-3">
        {!! $contenu->contenu_html !!}
    </div>

    <a href="{{ route('contenus.index') }}" class="btn btn-secondary mt-3">Retour</a>

</div>
@endsection
