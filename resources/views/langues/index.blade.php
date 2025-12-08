@extends('layout')

@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0.3em 0.8em;
        margin-left: 2px;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current, 
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: #0d6efd;
        color: white !important;
        border: 1px solid #0d6efd;
    }
    .btn-group-sm > .btn, .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.76563rem;
    }

    /* Styles pour les boutons d'action */
    .btn-action {
        margin: 0 3px;
    }
    /* Meilleur espacement pour le formulaire de suppression */
    .delete-form {
        display: inline-block;
    }
</style>
@endpush

@section('page_title')
<div class="row">
    <div class="col-sm-6">
        <h3 class="mb-0 animate-fade-in-left">Liste des Langues</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Langues</li>
        </ol>
    </div>
</div>
@endsection

@section('page_content')
<div class="row">
    <div class="col-12">
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title animate-fade-in-left">Gestion des Langues</h3>
                <!-- Bouton Ajouter une nouvelle langue -->
                <a href="{{ route('langues.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle"></i> Ajouter une langue
                </a>
            </div>
            
            <div class="card-body">
                <table id="languesTable" class="table table-bordered table-striped display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th style="width: 150px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($langues ?? [] as $langue)
                        <tr class="align-middle">
                            {{-- Utilisation de l'ID par défaut --}}
                            <td>{{ $langue->id }}</td> 
                            <td>{{ $langue->code_langue }}</td>
                            <td>{{ $langue->nom_langue }}</td>
                            <td>{{ Str::limit($langue->description, 50) }}</td>
                            <td class="actions-cell">
                                {{-- Utilisation de $langue->id pour les routes --}}
                                <a href="{{ route('langues.show', $langue->id) }}" class="btn btn-sm btn-info btn-action" title="Voir">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('langues.edit', $langue->id) }}" class="btn btn-sm btn-warning btn-action" title="Modifier">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                {{-- Utilisation de $langue->id pour la route destroy --}}
                                <form action="{{ route('langues.destroy', $langue->id) }}" 
                                        method="POST" 
                                        class="delete-form" 
                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette langue ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger btn-action" 
                                            data-bs-toggle="tooltip" 
                                            title="Supprimer">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Aucune langue trouvée</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection

@push('scripts')
<!-- DataTables & Plugins -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var table = document.getElementById('languesTable');
        if (table && $.fn.DataTable) { 
            var dataTable = $(table).DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/fr-FR.json"
                },
                "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                        '<"row"<"col-sm-12"tr>>' +
                        '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                "initComplete": function() {
                    $('.dataTables_filter').addClass('float-end mb-3');
                    $('.dataTables_filter input')
                        .addClass('form-control form-control-sm')
                        .attr('placeholder', 'Rechercher...');
                    
                    $('.dataTables_paginate').addClass('float-end');
                }
            });
            
            console.log('DataTable initialisée avec succès');
        } else {
            console.error('La table n\'a pas été trouvée ou jQuery/DataTable n\'est pas chargé.');
        }
    });
</script>
@endpush