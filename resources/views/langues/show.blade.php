@extends('layout2') {{-- Assurez-vous d'utiliser votre gabarit principal ici (layout ou layout2) --}}

@section('page_title')
<div class="row">
    <div class="col-sm-6">
        <h3 class="mb-0">Détails de la Langue</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('langues.index')}}">Langues</a></li>
            <li class="breadcrumb-item active" aria-current="page">Voir</li>
        </ol>
    </div>
</div>
@endsection

@section('page_content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Langue: {{ $langues->nom_langue }}</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th style="width: 30%">ID</th>
                            <td>{{ $langues->id }}</td>
                        </tr>
                        <tr>
                            <th>Code de la Langue</th>
                            <td>{{ $langues->code_langue }}</td>
                        </tr>
                        <tr>
                            <th>Nom de la Langue</th>
                            <td>{{ $langues->nom_langue }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $langues->description ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Date de Création</th>
                            <td>{{ $langues->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Dernière Mise à Jour</th>
                            <td>{{ $langues->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('langues.index') }}" class="btn btn-secondary">Retour à la liste</a>
                <a href="{{ route('langues.edit', $langues->id) }}" class="btn btn-warning">Modifier</a>
            </div>
        </div>
    </div>
</div>
@endsection