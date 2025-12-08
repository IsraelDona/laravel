@extends('layout')

@section('content')
<div class="container">
    <h2>Ajouter un Média</h2>

    <form action="{{ route('medias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Fichier</label>
            <input type="file" name="fichier" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Titre</label>
            <input type="text" name="titre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Type de Média</label>
            <select name="type_media_id" class="form-control" required>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->nom_type }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Contenu</label>
            <select name="contenu_id" class="form-control">
                <option value="">Aucun</option>
                @foreach($contenus as $c)
                    <option value="{{ $c->id }}">{{ $c->titre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Région</label>
            <select name="region_id" class="form-control">
                <option value="">Aucune</option>
                @foreach($regions as $r)
                    <option value="{{ $r->id }}">{{ $r->nom }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">
            <i class="fas fa-save"></i> Enregistrer
        </button>
    </form>
</div>
@endsection
