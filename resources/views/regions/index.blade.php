@extends('layout')

@section('title', 'Régions')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">
        <h3>Liste des Régions</h3>
        <a href="{{ route('regions.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Ajouter
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom Région</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($regions as $region)
                        <tr>
                            <td>{{ $region->id }}</td>
                            <td>{{ $region->nom }}</td>
                            <td>{{ $region->description }}</td>
                            <td class="actions-cell text-nowrap">
                                <a href="{{ route('regions.show', $region->id) }}" class="btn btn-info btn-sm btn-action" title="Voir">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('regions.edit', $region->id) }}" class="btn btn-warning btn-sm btn-action" title="Modifier">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('regions.destroy', $region->id) }}" method="POST" class="delete-form"
                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette région ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-action" title="Supprimer">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection
