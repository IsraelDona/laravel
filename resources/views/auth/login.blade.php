@extends('auth.layout')

@section('title', 'Connexion')

@section('content')
<div class="login-box">

    <div class="login-logo">
        <b>Culture</b> Bénin
    </div>

    <div class="card card-outline card-primary">
        <div class="card-body">

            <p class="login-box-msg">Connectez-vous pour continuer</p>

            @if ($errors->any())
                <div class="alert alert-danger p-2 text-center">
                    Identifiants incorrects
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <!-- Email -->
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <!-- Password -->
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
            </form>

            <p class="mt-3 mb-1">
                <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
            </p>

            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Créer un nouveau compte</a>
            </p>

        </div>
    </div>
</div>
@endsection
