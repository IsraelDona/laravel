@extends('layout')

@section('content')
<div class="container">
    <h2>Modifier un Média</h2>

    <form action="{{ route('medias.update', $media->id) }}" 
          method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Fichier actuel :</label><br>
            <img src="{{ asset($media->fichier) }}" width="120">
        </div>

        <div class="mb-3">
            <label>Nouveau fichier</label>
            <input type="file" name="fichier" class="form-control">
        </div>

        <div class="mb-3">
            <label>Titre</label>
            <input type="text" name="titre" value="{{ $media->titre }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">
                {{ $media->description }}
            </textarea>
        </div>

        <div class="mb-3">
            <label>Type de Média</label>
            <select name="type_media_id" class="form-control">
                @foreach($types as $type)
                    <option value="{{ $type->id }}" 
                        {{ $type->id == $media->type_media_id ? 'selected' : '' }}>
                        {{ $type->nom_type }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Contenu</label>
            <select name="contenu_id" class="form-control">
                <option value="">Aucun</option>
                @foreach($contenus as $c)
                    <option value="{{ $c->id }}" 
                        {{ $c->id == $media->contenu_id ? 'selected' : '' }}>
                        {{ $c->titre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Région</label>
            <select name="region_id" class="form-control">
                <option value="">Aucune</option>
                @foreach($regions as $r)
                    <option value="{{ $r->id }}"
                        {{ $r->id == $media->region_id ? 'selected' : '' }}>
                        {{ $r->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-warning">
            <i class="fas fa-edit"></i> Mettre à jour
        </button>
    </form>
</div>
@endsection
