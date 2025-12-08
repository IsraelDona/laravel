@extends('layout')

@section('content')
<div class="container">

    <h3>Créer un type de contenu</h3>

    <form action="{{ route('type_contenu.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Enregistrer</button>
    </form>

</div>
@endsection
