@extends('layout')

@section('title', 'Modifier la région')

@section('content')
<div class="container">

    <div class="card card-warning">
        <div class="card-header">
            <h4>Modifier : {{ $region->nom_region }}</h4>
        </div>

        <form method="POST" action="{{ route('regions.update', $region->id) }}">
            @csrf
            @method('PUT')

            <div class="card-body">

                <div class="form-group">
                    <label>Nom de la région</label>
                    <input type="text" name="nom_region" class="form-control" value="{{ $region->nom_region }}" required>
                </div>

                <div class="form-group mt-2">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ $region->description }}</textarea>
                </div>

            </div>

            <div class="card-footer text-end">
                <a href="{{ route('regions.index') }}" class="btn btn-secondary">Annuler</a>
                <button type="submit" class="btn btn-warning">Mettre à jour</button>
            </div>

        </form>
    </div>

</div>
@endsection
