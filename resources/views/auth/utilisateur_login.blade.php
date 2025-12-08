@extends('frontend.layout')

@section('title', 'Connexion Utilisateur')

@section('content')

<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">

    <h2 class="text-2xl font-bold text-center mb-4">Connexion</h2>

    @if ($errors->any())
        <div class="mb-3 text-red-600">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('utilisateur_login.post') }}" method="POST">
        @csrf

        <label class="block mb-2 font-semibold">Email</label>
        <input type="email" name="email"
               class="w-full border px-3 py-2 rounded mb-4" required>

        <label class="block mb-2 font-semibold">Mot de passe</label>
        <input type="password" name="password"
               class="w-full border px-3 py-2 rounded mb-4" required>

        <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Se connecter
        </button>
    </form>
</div>

@endsection
