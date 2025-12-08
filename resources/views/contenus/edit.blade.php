@extends('layout')

@section('content')
<div class="container">

    <h3>Modifier : {{ $contenu->titre }}</h3>

    <form action="{{ route('contenus.update', $contenu->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Titre</label>
            <input type="text" name="titre" class="form-control" value="{{ $contenu->titre }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $contenu->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Contenu HTML</label>
            <textarea name="contenu_html" class="form-control">{{ $contenu->contenu_html }}</textarea>
        </div>

        <div class="mb-3">
            <label>Région</label>
            <select name="region_id" class="form-control">
                @foreach($regions as $r)
                    <option value="{{ $r->id }}" @selected($contenu->region_id == $r->id)>
                        {{ $r->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-warning">Modifier</button>
    </form>

</div>
@endsection
