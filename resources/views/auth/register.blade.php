@extends('layouts.guest')
@section('content')
<div class="card shadow-lg border-0 rounded-4 overflow-hidden">

    <!-- header with brand -->
    <div class="card-header bg-white border-0 pt-4 pb-0 text-center">
        <h2 class="fw-bold text-primary">✨ Join AssetMarket</h2>
        <p class="text-secondary small">Create your free account</p>
    </div>

    <div class="card-body p-4 p-lg-5">

        <!-- Session Status (if any – Laravel component) -->
        <x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />

        <!-- Main form – all Laravel directives untouched -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <x-input-label for="name" :value="__('Name')" class="form-label fw-semibold" />
                <x-text-input id="name" class="form-control form-control-lg bg-light border-0 shadow-sm" type="text"
                    name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
                <x-input-error :messages="$errors->get('name')" class="text-danger small mt-1" />
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <x-input-label for="email" :value="__('Email')" class="form-label fw-semibold" />
                <x-text-input id="email" class="form-control form-control-lg bg-light border-0 shadow-sm" type="email"
                    name="email" :value="old('email')" required autocomplete="username"
                    placeholder="name@example.com" />
                <x-input-error :messages="$errors->get('email')" class="text-danger small mt-1" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <x-input-label for="password" :value="__('Password')" class="form-label fw-semibold" />
                <x-text-input id="password" class="form-control form-control-lg bg-light border-0 shadow-sm"
                    type="password" name="password" required autocomplete="new-password"
                    placeholder="•••••••• (min. 8 characters)" />
                <x-input-error :messages="$errors->get('password')" class="text-danger small mt-1" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                    class="form-label fw-semibold" />
                <x-text-input id="password_confirmation"
                    class="form-control form-control-lg bg-light border-0 shadow-sm" type="password"
                    name="password_confirmation" required autocomplete="new-password" placeholder="confirm password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger small mt-1" />
            </div>

            <!-- terms hint (bootstrap only) -->
            <div class="mb-4 small text-secondary">
                <i class="bi bi-info-circle me-1"></i> By signing up, you agree to our
                <a href="#" class="text-decoration-none">Terms</a> and
                <a href="#" class="text-decoration-none">Privacy Policy</a>.
            </div>

            <!-- actions: login link + register button -->
            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between gap-3">
                <a class="text-decoration-none small" href="{{ route('login') }}">
                    <i class="bi bi-box-arrow-in-right me-1"></i>{{ __('Already registered?') }}
                </a>

                <x-primary-button class="btn btn-warning px-5 py-3 fw-semibold w-100 w-sm-auto">
                    {{ __('Register') }} <i class="bi bi-person-plus ms-2"></i>
                </x-primary-button>
            </div>

            <!-- optional divider (just for style) -->
            <div class="text-center mt-4">
                <span class="badge bg-light text-secondary px-3 py-2 rounded-pill">
                    <i class="bi bi-shield-lock me-1"></i> secured by Laravel
                </span>
            </div>
        </form>
    </div>

    <!-- simple footer -->
    <div class="card-footer bg-white border-0 text-center pb-4 text-secondary small">
        <i class="bi bi-heart-fill text-danger me-1"></i> Join 10,000+ creators
    </div>
</div>
<div class="text-center mt-4">
    <a href="#" class="text-secondary text-decoration-none small">
        <i class="bi bi-arrow-left me-1"></i> Back to AssetMarket
    </a>
</div>
@endsection