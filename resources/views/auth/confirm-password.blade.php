@extends('layouts.guest')

@section('content')

<div class="card shadow-lg border-0 rounded-4 overflow-hidden">

    <!-- header with brand & security icon -->
    <div class="card-header bg-white border-0 pt-4 pb-0 text-center">
        <div class="mb-2">
            <i class="bi bi-shield-lock-fill text-primary fs-1"></i>
        </div>
        <h2 class="fw-bold text-primary">Secure area</h2>
        <p class="text-secondary small">Please confirm your password</p>
    </div>

    <div class="card-body p-4 p-lg-5">

        <!-- info text (converted to Bootstrap alert style) -->
        <div class="alert alert-warning bg-warning bg-opacity-10 border-0 d-flex align-items-center mb-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill text-warning me-3 fs-4"></i>
            <span
                class="small">{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}</span>
        </div>

        <!-- Main form – all Laravel directives untouched -->
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="form-label fw-semibold" />
                <div class="input-group">
                    <span class="input-group-text bg-light border-0" id="basic-addon1">
                        <i class="bi bi-lock"></i>
                    </span>
                    <x-text-input id="password" class="form-control form-control-lg bg-light border-0 shadow-sm"
                        type="password" name="password" required autocomplete="current-password"
                        placeholder="enter your password" aria-label="Password" aria-describedby="basic-addon1" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="text-danger small mt-2" />
            </div>

            <!-- actions: back + confirm button -->
            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between gap-3">
                <a class="text-decoration-none small" href="{{ route('dashboard') }}">
                    <i class="bi bi-arrow-left me-1"></i>{{ __('Cancel') }}
                </a>

                <x-primary-button class="btn btn-warning px-5 py-3 fw-semibold w-100 w-sm-auto">
                    <i class="bi bi-check-circle me-2"></i>{{ __('Confirm password') }}
                </x-primary-button>
            </div>

            <!-- extra security note -->
            <div class="text-center mt-4">
                <span class="badge bg-light text-secondary px-3 py-2 rounded-pill">
                    <i class="bi bi-shield-check me-1"></i> extra security step
                </span>
            </div>
        </form>
    </div>

    <!-- simple footer -->
    <div class="card-footer bg-white border-0 text-center pb-4 text-secondary small">
        <i class="bi bi-clock me-1"></i> Session will be confirmed
    </div>
</div>

<div class="text-center mt-4">
    <a href="#" class="text-secondary text-decoration-none small">
        <i class="bi bi-house me-1"></i> Return to AssetMarket
    </a>
</div>
@endsection