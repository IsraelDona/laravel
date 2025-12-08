@extends('layout')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h3>Contenus</h3>
        <a href="{{ route('contenus.create') }}" class="btn btn-primary">Ajouter contenu</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Région</th>
                <th>Type</th>
                <th>Langue</th>
                <th width="180">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contenus as $c)
                <tr>
                    <td>{{ $c->titre }}</td>
                    <td>{{ $c->region->nom }}</td>
                    <td>{{ $c->typeContenu->nom }}</td>
                    <td>{{ $c->langue->nom_langue }}</td>
                    <td class="actions-cell text-nowrap">
    <a href="{{ route('contenus.show', $c->id) }}" class="btn btn-info btn-sm btn-action" title="Voir">
        <i class="bi bi-eye"></i>
    </a>
    <a href="{{ route('contenus.edit', $c->id) }}" class="btn btn-warning btn-sm btn-action" title="Modifier">
        <i class="bi bi-pencil"></i>
    </a>
    <form action="{{ route('contenus.destroy', $c->id) }}" method="POST" class="delete-form"
          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce contenu ?');">
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
