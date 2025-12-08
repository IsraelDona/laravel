@extends('layout')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h3>Types de média</h3>
        <a href="{{ route('type_media.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Ajouter
        </a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $t)
                <tr>
                    <td>{{ $t->id }}</td>
                    <td>{{ $t->nom_type }}</td>
                    <td>{{ $t->description }}</td>
                    <td class="actions-cell text-nowrap">
                        <a href="{{ route('type_media.show', $t->id) }}" class="btn btn-info btn-sm btn-action" title="Voir">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('type_media.edit', $t->id) }}" class="btn btn-warning btn-sm btn-action" title="Modifier">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('type_media.destroy', $t->id) }}" method="POST" class="delete-form"
                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce type de média ?');">
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
