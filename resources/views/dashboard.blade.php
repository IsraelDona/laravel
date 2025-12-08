@extends('layout')

@section('content')
<div class="container-fluid">

    <!-- En-tête du dashboard -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
                    <p class="mb-0 text-muted">Bienvenue dans l'espace d'administration</p>
                </div>
                <div class="text-right">
                    <div class="text-sm text-gray-600">{{ now()->format('d/m/Y') }}</div>
                    <div class="text-sm text-gray-500">{{ now()->format('H:i') }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section des statistiques -->
    <div class="row mb-4">

        <!-- Users Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Utilisateurs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $usersCount ?? '45' }}</div>
                            <div class="mt-2">
                                <span class="badge badge-success">+12% ce mois</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-people-fill fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <a href="{{ route('utilisateurs.index') }}" class="text-primary text-decoration-none">
                        Voir détails <i class="bi bi-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Langues Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Langues</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $languagesCount ?? '12' }}</div>
                            <div class="mt-2">
                                <span class="text-success small">Actives: 10</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-translate fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <a href="{{ route('langues.index') }}" class="text-success text-decoration-none">
                        Gérer les langues <i class="bi bi-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Régions Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Régions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $regionsCount ?? '8' }}</div>
                            <div class="mt-2">
                                <span class="badge badge-warning">À vérifier: 2</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-map-fill fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <a href="{{ route('regions.index') }}" class="text-warning text-decoration-none">
                        Explorer <i class="bi bi-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Médias Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Médias</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mediaCount ?? '31' }}</div>
                            <div class="mt-2">
                                <span class="text-danger small">Stockage: 45.2 MB</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-image-fill fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <a href="{{ route('medias.index') }}" class="text-danger text-decoration-none">
                        Voir galerie <i class="bi bi-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Section Activités récentes & Graphiques -->
    <div class="row">

        <!-- Activités récentes -->
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Activités récentes</h6>
                    <a href="#" class="text-primary small">Voir tout</a>
                </div>
                <div class="card-body">
                    <div class="activity-feed">
                        @for($i = 0; $i < 5; $i++)
                        <div class="feed-item {{ $i > 0 ? 'mt-3' : '' }}">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <div class="font-weight-bold">Nouvel utilisateur</div>
                                    <div class="text-muted small">Jean Dupont s'est inscrit</div>
                                </div>
                                <div class="text-right">
                                    <div class="text-muted small">Il y a 2h</div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistiques rapides -->
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success">Statistiques rapides</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <div class="text-center p-3 border rounded">
                                <div class="text-primary font-weight-bold">24</div>
                                <div class="text-muted small">Utilisateurs actifs</div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="text-center p-3 border rounded">
                                <div class="text-success font-weight-bold">156</div>
                                <div class="text-muted small">Visites aujourd'hui</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 border rounded">
                                <div class="text-warning font-weight-bold">78%</div>
                                <div class="text-muted small">Taux de satisfaction</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 border rounded">
                                <div class="text-danger font-weight-bold">3</div>
                                <div class="text-muted small">Tickets ouverts</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Actions rapides -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Actions rapides</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="{{ route('utilisateurs.create') }}" class="btn btn-primary btn-block">
                                <i class="bi bi-person-plus"></i> Ajouter un utilisateur
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="{{ route('langues.create') }}" class="btn btn-success btn-block">
                                <i class="bi bi-plus-circle"></i> Ajouter une langue
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="{{ route('regions.create') }}" class="btn btn-warning btn-block">
                                <i class="bi bi-plus-square"></i> Ajouter une région
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="{{ route('medias.create') }}" class="btn btn-danger btn-block">
                                <i class="bi bi-upload"></i> Uploader un média
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .card {
        border-radius: 0.75rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .border-left-primary {
        border-left: 4px solid #4e73df !important;
    }
    
    .border-left-success {
        border-left: 4px solid #1cc88a !important;
    }
    
    .border-left-warning {
        border-left: 4px solid #f6c23e !important;
    }
    
    .border-left-danger {
        border-left: 4px solid #e74a3b !important;
    }
    
    .feed-item {
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }
    
    .feed-item:last-child {
        border-bottom: none;
    }
    
    .activity-feed {
        max-height: 300px;
        overflow-y: auto;
    }
    
    /* Scrollbar personnalisée */
    .activity-feed::-webkit-scrollbar {
        width: 5px;
    }
    
    .activity-feed::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .activity-feed::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }
    
    .activity-feed::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>

@endsection