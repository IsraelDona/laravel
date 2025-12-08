@extends('layout')

@section('content')
<div class="container">

    <h3>Créer un contenu</h3>

    <form action="{{ route('contenus.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Titre</label>
            <input type="text" name="titre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Contenu HTML</label>
            <textarea name="contenu_html" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Région</label>
            <select name="region_id" class="form-control">
                @foreach($regions as $r)
                    <option value="{{ $r->id }}">{{ $r->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Type contenu</label>
            <select name="type_contenu_id" class="form-control">
                @foreach($types as $t)
                    <option value="{{ $t->id }}">{{ $t->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Langue</label>
            <select name="langue_id" class="form-control">
                @foreach($langues as $l)
                    <option value="{{ $l->id_langue }}">{{ $l->nom_langue }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Enregistrer</button>

    </form>

</div>
@endsection
