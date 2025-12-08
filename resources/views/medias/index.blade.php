@extends('layout')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h2>Liste des Médias</h2>
        <a href="{{ route('medias.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Ajouter
        </a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Fichier</th>
                <th>Titre</th>
                <th>Type</th>
                <th>Contenu</th>
                <th>Région</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($medias as $media)
                <tr>
                    <td>{{ $media->id }}</td>
                    <td><img src="{{ asset($media->fichier) }}" width="80"></td>
                    <td>{{ $media->titre }}</td>
                    <td>{{ $media->typeMedia->nom_type ?? '—' }}</td>
                    <td>{{ $media->contenu->titre ?? '—' }}</td>
                    <td>{{ $media->region->nom ?? '—' }}</td>
                    <td class="actions-cell text-nowrap d-flex">
                        <a href="{{ route('medias.show', $media->id) }}" class="btn btn-info btn-sm btn-action me-1" title="Voir">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('medias.edit', $media->id) }}" class="btn btn-warning btn-sm btn-action me-1" title="Modifier">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('medias.destroy', $media->id) }}" method="POST" class="delete-form"
                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce média ?');">
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
@endsection
