@extends('layout')

@section('content')
<div class="container">

    <h3>Modifier : {{ $typeMedia->nom }}</h3>

    <form action="{{ route('type_medias.update', $typeMedia->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ $typeMedia->nom }}" required>
        </div>

        <div class="mb-3">
            <label>Extension</label>
            <input type="text" name="extension" class="form-control" value="{{ $typeMedia->extension }}" required>
        </div>

        <button class="btn btn-warning">Modifier</button>

    </form>

</div>
@endsection
