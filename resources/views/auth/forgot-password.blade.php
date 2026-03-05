@extends('layouts.guest')

@section('content')

<!-- main card (elevated, rounded, clean) -->
<div class="card shadow-lg border-0 rounded-4 overflow-hidden">

    <!-- header with brand -->
    <div class="card-header bg-white border-0 pt-4 pb-0 text-center">
        <h2 class="fw-bold text-primary">🔐 Reset password</h2>
        <p class="text-secondary small">We'll send you a reset link</p>
    </div>

    <div class="card-body p-4 p-lg-5">

        <!-- info text (converted to Bootstrap alert style) -->
        <div class="alert alert-info bg-light border-0 d-flex align-items-center mb-4" role="alert">
            <i class="bi bi-info-circle-fill me-3 fs-4"></i>
            <span
                class="small">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</span>
        </div>

        <!-- Session Status (Laravel component – works exactly as before) -->
        <x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />

        <!-- Main form – all Laravel directives untouched -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="form-label fw-semibold" />
                <x-text-input id="email" class="form-control form-control-lg bg-light border-0 shadow-sm" type="email"
                    name="email" :value="old('email')" required autofocus placeholder="name@example.com" />
                <x-input-error :messages="$errors->get('email')" class="text-danger small mt-2" />
            </div>

            <!-- actions: back to login + submit button -->
            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between gap-3">
                <a class="text-decoration-none small" href="{{ route('login') }}">
                    <i class="bi bi-arrow-left me-1"></i>{{ __('Back to login') }}
                </a>

                <x-primary-button class="btn btn-warning px-4 py-3 fw-semibold w-100 w-sm-auto">
                    <i class="bi bi-envelope-paper me-2"></i>{{ __('Email Reset Link') }}
                </x-primary-button>
            </div>

            <!-- extra security note -->
            <div class="text-center mt-4">
                <span class="badge bg-light text-secondary px-3 py-2 rounded-pill">
                    <i class="bi bi-shield-check me-1"></i> secure & encrypted
                </span>
            </div>
        </form>
    </div>

    <!-- simple footer -->
    <div class="card-footer bg-white border-0 text-center pb-4 text-secondary small">
        <i class="bi bi-clock-history me-1"></i> Link expires in 60 minutes
    </div>
</div>

<!-- back to home (optional) -->
<div class="text-center mt-4">
    <a href="#" class="text-secondary text-decoration-none small">
        <i class="bi bi-house me-1"></i> Return to AssetMarket
    </a>
</div>
@endsection