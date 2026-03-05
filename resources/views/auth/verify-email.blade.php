@extends('layouts.guest')

@section('content')

<!-- main card (elevated, rounded, clean) -->
<div class="card shadow-lg border-0 rounded-4 overflow-hidden">

    <!-- header with brand & email icon -->
    <div class="card-header bg-white border-0 pt-4 pb-0 text-center">
        <div class="mb-2">
            <i class="bi bi-envelope-check-fill text-primary fs-1"></i>
        </div>
        <h2 class="fw-bold text-primary">Verify your email</h2>
        <p class="text-secondary small">One last step to get started</p>
    </div>

    <div class="card-body p-4 p-lg-5">

        <!-- main info text (converted to Bootstrap alert style) -->
        <div class="alert alert-info bg-info bg-opacity-10 border-0 d-flex align-items-center mb-4" role="alert">
            <i class="bi bi-info-circle-fill text-info me-3 fs-4"></i>
            <span
                class="small">{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</span>
        </div>

        <!-- verification link sent status (Laravel session) -->
        @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-3 fs-4"></i>
            <span>{{ __('A new verification link has been sent to the email address you provided during registration.') }}</span>
        </div>
        @endif

        <!-- two forms side by side (resend + logout) -->
        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between gap-3 mt-3">

            <!-- Resend Verification Email Form -->
            <form method="POST" action="{{ route('verification.send') }}" class="w-100 w-sm-auto">
                @csrf
                <x-primary-button class="btn btn-warning px-4 py-3 fw-semibold w-100">
                    <i class="bi bi-envelope-arrow-up me-2"></i>{{ __('Resend Verification Email') }}
                </x-primary-button>
            </form>

            <!-- Logout Form -->
            <form method="POST" action="{{ route('logout') }}" class="w-100 w-sm-auto">
                @csrf
                <button type="submit" class="btn btn-outline-secondary px-4 py-3 fw-semibold w-100">
                    <i class="bi bi-box-arrow-right me-2"></i>{{ __('Log Out') }}
                </button>
            </form>
        </div>

        <!-- extra tip -->
        <div class="text-center mt-4">
            <span class="badge bg-light text-secondary px-3 py-2 rounded-pill">
                <i class="bi bi-hourglass-split me-1"></i> Check your spam folder
            </span>
        </div>
    </div>

    <!-- simple footer -->
    <div class="card-footer bg-white border-0 text-center pb-4 text-secondary small">
        <i class="bi bi-shield-check me-1"></i> Verification required for full access
    </div>
</div>

<!-- back to home (optional) -->
<div class="text-center mt-4">
    <a href="#" class="text-secondary text-decoration-none small">
        <i class="bi bi-house me-1"></i> Return to AssetMarket
    </a>
</div>
@endsection