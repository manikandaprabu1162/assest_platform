@extends('layouts.guest')

@section('content')

<div class="card shadow-lg border-0 rounded-4 overflow-hidden">

    <!-- optional header / brand -->
    <div class="card-header bg-white border-0 pt-4 pb-0 text-center">
        <h2 class="fw-bold text-primary">🔐 AssetMarket</h2>
        <p class="text-secondary small">Sign in to your account</p>
    </div>

    <div class="card-body p-4 p-lg-5">

        <!-- Session Status (Laravel component – works exactly as before) -->
        <x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />

        <!-- Main form – all Laravel directives untouched -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <x-input-label for="email" :value="__('Email')" class="form-label fw-semibold" />
                <x-text-input id="email" class="form-control form-control-lg bg-light border-0 shadow-sm" type="email"
                    name="email" :value="old('email')" required autofocus autocomplete="username"
                    placeholder="name@example.com" />
                <x-input-error :messages="$errors->get('email')" class="text-danger small mt-1" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <x-input-label for="password" :value="__('Password')" class="form-label fw-semibold" />
                <x-text-input id="password" class="form-control form-control-lg bg-light border-0 shadow-sm"
                    type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="text-danger small mt-1" />
            </div>

            <!-- Remember Me (Bootstrap checkbox) -->
            <div class="mb-4 form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label text-secondary">
                    {{ __('Remember me') }}
                </label>
            </div>

            <!-- actions: forgot password + login button -->
            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between gap-3">
                @if (Route::has('password.request'))
                <a class="text-decoration-none small" href="{{ route('password.request') }}">
                    <i class="bi bi-shield-lock me-1"></i>{{ __('Forgot your password?') }}
                </a>
                @endif

                <x-primary-button class="btn btn-warning px-5 py-3 fw-semibold w-100 w-sm-auto">
                    {{ __('Log in') }} <i class="bi bi-arrow-right ms-2"></i>
                </x-primary-button>
            </div>

            <!-- extra: sign up link (nice to have) -->
            <div class="text-center mt-4">
                <span class="text-secondary small">Don't have an account?</span>
                <a href="#" class="text-decoration-none small fw-semibold ms-1">Sign up</a>
            </div>
        </form>
    </div>

    <!-- subtle footer -->
    <div class="card-footer bg-white border-0 text-center pb-4 text-secondary small">
        <i class="bi bi-shield-check me-1"></i> Protected by Laravel
    </div>
</div>
<!-- back to home link (optional) -->
<div class="text-center mt-4">
    <a href="#" class="text-secondary text-decoration-none small">
        <i class="bi bi-arrow-left me-1"></i> Back to AssetMarket
    </a>
</div>
@endsection