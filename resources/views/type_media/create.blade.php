@extends('layout')

@section('content')
<div class="container">

    <h3>Créer un type de média</h3>

    <form action="{{ route('type_medias.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Extension</label>
            <input type="text" name="extension" class="form-control" required>
        </div>

        <button class="btn btn-success">Enregistrer</button>

    </form>

</div>
@endsection
