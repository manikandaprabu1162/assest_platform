<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password · AssetMarket</title>
    <!-- Bootstrap 5 (only CSS, no custom styles) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (optional, adds clean visual cues) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light d-flex align-items-center min-vh-100 py-4">

    <!-- 
        LARAVEL RESET PASSWORD FORM (with token) – fully functional, Bootstrap only.
        All Laravel directives (@csrf, token, old, errors, route) are preserved.
        Classes are replaced with Bootstrap equivalents – zero custom CSS.
    -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">

                <!-- main card (elevated, rounded, clean) -->
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">

                    <!-- header with brand -->
                    <div class="card-header bg-white border-0 pt-4 pb-0 text-center">
                        <div class="mb-2">
                            <i class="bi bi-arrow-repeat text-primary fs-1"></i>
                        </div>
                        <h2 class="fw-bold text-primary">Create new password</h2>
                        <p class="text-secondary small">Enter your email and new password</p>
                    </div>

                    <div class="card-body p-4 p-lg-5">

                        <!-- Session Status (if any) -->
                        <x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />

                        <!-- Main form – all Laravel directives untouched -->
                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <!-- Password Reset Token (hidden, preserved) -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Email Address (pre-filled from token) -->
                            <div class="mb-3">
                                <x-input-label for="email" :value="__('Email')" class="form-label fw-semibold" />
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <x-text-input id="email"
                                        class="form-control form-control-lg bg-light border-0 shadow-sm" type="email"
                                        name="email" :value="old('email', $request->email)" required autofocus
                                        autocomplete="username" placeholder="your@email.com" />
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="text-danger small mt-2" />
                            </div>

                            <!-- New Password -->
                            <div class="mb-3">
                                <x-input-label for="password" :value="__('New Password')"
                                    class="form-label fw-semibold" />
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <x-text-input id="password"
                                        class="form-control form-control-lg bg-light border-0 shadow-sm" type="password"
                                        name="password" required autocomplete="new-password"
                                        placeholder="•••••••• (min. 8 characters)" />
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="text-danger small mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                                    class="form-label fw-semibold" />
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0">
                                        <i class="bi bi-lock-fill"></i>
                                    </span>
                                    <x-text-input id="password_confirmation"
                                        class="form-control form-control-lg bg-light border-0 shadow-sm" type="password"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="re-enter new password" />
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')"
                                    class="text-danger small mt-2" />
                            </div>

                            <!-- password strength hint (bootstrap only) -->
                            <div class="mb-4 small text-secondary">
                                <i class="bi bi-shield-check me-1"></i> Password must be at least 8 characters
                            </div>

                            <!-- actions: back to login + reset button -->
                            <div
                                class="d-flex flex-column flex-sm-row align-items-center justify-content-between gap-3">
                                <a class="text-decoration-none small" href="{{ route('login') }}">
                                    <i class="bi bi-arrow-left me-1"></i>{{ __('Back to login') }}
                                </a>

                                <x-primary-button class="btn btn-warning px-5 py-3 fw-semibold w-100 w-sm-auto">
                                    <i class="bi bi-check-circle me-2"></i>{{ __('Reset Password') }}
                                </x-primary-button>
                            </div>

                            <!-- security badge -->
                            <div class="text-center mt-4">
                                <span class="badge bg-light text-secondary px-3 py-2 rounded-pill">
                                    <i class="bi bi-shield-lock me-1"></i> secure reset token
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
            </div>
        </div>
    </div>

    <!-- Bootstrap JS bundle (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>