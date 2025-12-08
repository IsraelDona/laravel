@extends('layout')

@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
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
    .btn-action {
        margin: 0 3px;
    }
    .delete-form {
        display: inline-block;
    }
    .user-avatar {
        width: 30px;
        height: 30px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 8px;
        border: 1px solid #eee;
    }
    .status-badge {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 0.85em;
        font-weight: 600;
        text-transform: capitalize;
    }
    .status-actif { background-color: #d1e7dd; color: #0f5132; }
    .status-inactif { background-color: #fff3cd; color: #664d03; }
    .status-bloque { background-color: #f8d7da; color: #842029; }
</style>
@endpush

@section('page_title')
<div class="row">
    <div class="col-sm-6">
        <h3 class="mb-0 animate-fade-in-left">Gestion des Utilisateurs</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Utilisateurs</li>
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

        <div class="card mb-4 shadow-lg">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title animate-fade-in-left">Liste des Utilisateurs</h3>
                <!-- Bouton Ajouter un nouvel utilisateur -->
                <a href="{{ route('utilisateurs.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle"></i> Ajouter un utilisateur
                </a>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="utilisateursTable" class="table table-bordered table-striped display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Nom Complet</th>
                                <th>Email</th>
                                <th>Rôle</th>
                                <th>Langue</th>
                                <th>Statut</th>
                                <th style="width: 120px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($utilisateurs ?? [] as $utilisateur)
                            <tr class="align-middle">
                                <td>
                                    @if($utilisateur->photo)
                                        <img src="{{ asset('storage/' . $utilisateur->photo) }}" alt="{{ $utilisateur->nom }}" class="user-avatar">
                                    @else
                                        <img src="https://placehold.co/30x30/007bff/white?text={{ substr($utilisateur->prenom ?? $utilisateur->nom, 0, 1) }}" alt="Avatar" class="user-avatar">
                                    @endif
                                </td>
                                <td>{{ $utilisateur->prenom }} {{ $utilisateur->nom }}</td>
                                <td>{{ $utilisateur->email }}</td>
                                <td>{{ $utilisateur->role->nom_role ?? 'N/A' }}</td>
                                <td>{{ $utilisateur->langue->nom_langue ?? 'N/A' }}</td>
                                <td>
                                    <span class="status-badge status-{{ $utilisateur->statut }}">
                                        {{ $utilisateur->statut }}
                                    </span>
                                </td>
                                <td class="actions-cell text-nowrap">
                                    <a href="{{ route('utilisateurs.show', $utilisateur->id) }}" class="btn btn-sm btn-info btn-action" title="Voir">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('utilisateurs.edit', $utilisateur->id) }}" class="btn btn-sm btn-warning btn-action" title="Modifier">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('utilisateurs.destroy', $utilisateur->id) }}" 
                                            method="POST" 
                                            class="delete-form" 
                                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger btn-action" 
                                                title="Supprimer">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Aucun utilisateur trouvé</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
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
        var table = document.getElementById('utilisateursTable');
        if (table && $.fn.DataTable) { 
            $(table).DataTable({
                "responsive": true,
                "lengthChange": true, // Laisser le choix du nombre d'entrées
                "autoWidth": false,
                "pageLength": 10, // Nombre d'entrées par défaut
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/fr-FR.json"
                },
                "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                        '<"row"<"col-sm-12"tr>>' +
                        '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                "order": [[1, 'asc']], // Tri par défaut sur Nom Complet
                "columnDefs": [
                    { "orderable": false, "targets": [0, 6] } // Désactiver le tri sur Photo et Actions
                ],
                "initComplete": function() {
                    $('.dataTables_filter').addClass('float-end mb-3');
                    $('.dataTables_filter input')
                        .addClass('form-control form-control-sm')
                        .attr('placeholder', 'Rechercher...');
                    
                    $('.dataTables_paginate').addClass('float-end');
                }
            });
            console.log('DataTable Utilisateurs initialisée avec succès');
        } else {
            console.error('La table utilisateurs n\'a pas été trouvée ou jQuery/DataTable n\'est pas chargé.');
        }
    });
</script>
@endpush