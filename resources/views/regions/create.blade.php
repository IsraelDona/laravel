@extends('layout')

@section('title', 'Ajouter une région')

@section('content')
<div class="container">

    <div class="card card-primary">
        <div class="card-header">
            <h4>Ajouter une Région</h4>
        </div>

        <form method="POST" action="{{ route('regions.store') }}">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label>Nom de la région</label>
                    <input type="text" name="nom_region" class="form-control" required>
                </div>

                <div class="form-group mt-2">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>

            </div>

            <div class="card-footer text-end">
                <a href="{{ route('regions.index') }}" class="btn btn-secondary">Annuler</a>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>

</div>
@endsection
