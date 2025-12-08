@extends('auth.layout')

@section('title', 'Créer un compte')

@section('content')
<div class="register-box">

    <div class="register-logo">
        <b>Culture</b> Bénin
    </div>

    <div class="card card-outline card-primary">
        <div class="card-body">

            <p class="login-box-msg">Créer un nouveau compte</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Nom complet" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
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

                <!-- Confirm Password -->
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmer le mot de passe" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">S’enregistrer</button>
            </form>

            <p class="mt-3">
                <a href="{{ route('login') }}" class="text-center">J'ai déjà un compte</a>
            </p>

        </div>
    </div>
</div>
@endsection
