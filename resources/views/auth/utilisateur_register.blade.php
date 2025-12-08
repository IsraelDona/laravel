@extends('frontend.layout')

@section('title', 'Inscription')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center py-12 px-4">
    <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-green-700">Inscription</h2>
            <p class="text-gray-600 mt-2">Rejoignez notre communauté</p>
        </div>

        @if($errors->any())
            <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                <ul class="text-red-600 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('utilisateur_register.post') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nom complet *</label>
                <input type="text" name="name" required
                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    value="{{ old('name') }}"
                    placeholder="Entrez votre nom complet">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Email *</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    value="{{ old('email') }}"
                    placeholder="exemple@email.com">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Mot de passe *</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    placeholder="Minimum 8 caractères">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Confirmer le mot de passe *</label>
                <input type="password" name="password_confirmation" required
                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    placeholder="Répétez votre mot de passe">
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-300 transform hover:-translate-y-1">
                S'inscrire
            </button>
        </form>

        <div class="mt-8 text-center">
            <p class="text-gray-600">
                Déjà un compte ?
                <a href="{{ route('utilisateur_login') }}" 
                   class="text-green-600 hover:text-green-800 font-semibold transition-colors duration-300">
                    Se connecter
                </a>
            </p>
        </div>
    </div>
</div>
@endsection