{{-- resources/views/auth/forgot-password.blade.php --}}
@extends('auth.layout') {{-- ou 'layout' selon ton projet --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-outline card-primary mt-5">
                <div class="card-header text-center">
                    <a href="{{ url('/') }}" class="h1"><b>MLD</b> Bénin</a>
                </div>

                <div class="card-body">
                    <p class="mb-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </p>

                    {{-- Session Status (si present) --}}
                    @if(session('status'))
                      <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Email Password Reset Link') }}
                            </button>
                        </div>
                    </form>

                    <p class="mt-3 mb-0">
                        <a href="{{ route('login') }}">{{ __('Back to login') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
