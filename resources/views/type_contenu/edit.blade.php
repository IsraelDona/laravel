@extends('layout')

@section('content')
<div class="container">

    <h3>Modifier : {{ $typeContenu->nom }}</h3>

    <form action="{{ route('type_contenu.update', $typeContenu->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control"
                   value="{{ $typeContenu->nom }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $typeContenu->description }}</textarea>
        </div>

        <button class="btn btn-warning">Modifier</button>
    </form>

</div>
@endsection
