@extends('layout')

@push('styles')
<style>
    .profile-img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #fff;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .info-label {
        font-weight: 600;
        color: #495057;
    }
    .info-value {
        color: #212529;
    }
    .badge-status {
        font-size: 1em;
        padding: 0.5em 1em;
    }
    .badge-actif { background-color: #d1e7dd; color: #0f5132; }
    .badge-inactif { background-color: #fff3cd; color: #664d03; }
    .badge-bloque { background-color: #f8d7da; color: #842029; }
</style>
@endpush

@section('page_title')
<div class="row">
    <div class="col-sm-6">
        <h3 class="mb-0 animate-fade-in-left">Détails de l'Utilisateur</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('utilisateurs.index')}}">Utilisateurs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Détails</li>
        </ol>
    </div>
</div>
@endsection

@section('page_content')
<div class="row">
    <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
        <div class="card card-primary card-outline shadow-lg animate-slide-in-up">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">{{ $utilisateur->prenom }} {{ $utilisateur->name }}</h3>
                <div class="card-tools">
                    <a href="{{ route('utilisateurs.edit', $utilisateur->id) }}" class="btn btn-sm btn-light">
                        <i class="bi bi-pencil"></i> Modifier
                    </a>
                </div>
            </div>
            
            <div class="card-body">
                <div class="text-center mb-4">
                    @if($utilisateur->photo)
                        <img src="{{ asset('storage/' . $utilisateur->photo) }}" alt="Photo de {{ $utilisateur->prenom }}" class="profile-img">
                    @else
                        <img src="https://placehold.co/150x150/007bff/white?text={{ substr($utilisateur->prenom ?? $utilisateur->name, 0, 1) }}" alt="Avatar" class="profile-img">
                    @endif
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="info-label">Nom Complet:</p>
                        <p class="info-value">{{ $utilisateur->prenom }} {{ $utilisateur->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="info-label">Email:</p>
                        <p class="info-value">{{ $utilisateur->email }}</p>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="info-label">Rôle:</p>
                        <p class="info-value">{{ $utilisateur->role->nom_role ?? 'Non défini' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="info-label">Langue Préférée:</p>
                        <p class="info-value">{{ $utilisateur->langue->nom_langue ?? 'Non définie' }}</p>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="info-label">Sexe:</p>
                        <p class="info-value">
                            @if($utilisateur->sexe == 'M') Masculin
                            @elseif($utilisateur->sexe == 'F') Féminin
                            @else Autre
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="info-label">Date de Naissance:</p>
                        <p class="info-value">{{ $utilisateur->date_naissance ? \Carbon\Carbon::parse($utilisateur->date_naissance)->format('d/m/Y') : 'Non spécifiée' }}</p>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="info-label">Statut:</p>
                        <span class="badge badge-status badge-{{ $utilisateur->statut }}">{{ $utilisateur->statut }}</span>
                    </div>
                    <div class="col-md-6">
                        <p class="info-label">Date d'Inscription:</p>
                        <p class="info-value">{{ \Carbon\Carbon::parse($utilisateur->created_at)->format('d/m/Y à H:i') }}</p>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            
            <div class="card-footer">
                <a href="{{ route('utilisateurs.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Retour à la liste
                </a>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection