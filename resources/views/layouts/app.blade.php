<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AssetMarket — best design, Bootstrap only</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Prose CSS for rich text styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/typography@0.5.x/dist/typography.min.css">

    <!-- Custom prose styling for RichEditor content -->
    <style>
    .prose {
        max-width: 100%;
    }

    .prose h1,
    .prose h2,
    .prose h3,
    .prose h4,
    .prose h5,
    .prose h6 {
        font-weight: 600;
        margin-top: 1.5em;
        margin-bottom: 0.5em;
        color: #212529;
    }

    .prose h1 {
        font-size: 2em;
    }

    .prose h2 {
        font-size: 1.5em;
    }

    .prose h3 {
        font-size: 1.25em;
    }

    .prose p {
        margin-bottom: 1em;
        line-height: 1.75;
    }

    .prose a {
        color: #0d6efd;
        text-decoration: none;
    }

    .prose a:hover {
        text-decoration: underline;
    }

    .prose ul,
    .prose ol {
        margin-left: 1.5em;
        margin-bottom: 1em;
    }

    .prose li {
        margin-bottom: 0.5em;
    }

    .prose blockquote {
        border-left: 4px solid #dee2e6;
        padding-left: 1em;
        margin-left: 0;
        margin-bottom: 1em;
        color: #6c757d;
        font-style: italic;
    }

    .prose code {
        background-color: #f8f9fa;
        padding: 0.2em 0.4em;
        border-radius: 0.25em;
        font-family: 'Courier New', monospace;
        color: #d63384;
    }

    .prose pre {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 0.5em;
        padding: 1em;
        overflow-x: auto;
        margin-bottom: 1em;
    }

    .prose pre code {
        background-color: transparent;
        color: #212529;
        padding: 0;
    }

    .prose img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5em;
        margin: 1em 0;
    }

    .prose table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1em;
    }

    .prose table th {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        padding: 0.75em;
        text-align: left;
        font-weight: 600;
    }

    .prose table td {
        border: 1px solid #dee2e6;
        padding: 0.75em;
    }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="#">
                <span class="text-warning">◆</span> AssetMarket
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-medium">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('purchases.my') }}" class="nav-link {{ request()->routeIs('purchases.my') ? 'active' : '' }}">
                            My Purchases
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('wishlist.index') }}" class="nav-link {{ request()->routeIs('wishlist.index') ? 'active' : '' }}">
                            Wishlist
                        </a>
                    </li>
                </ul>
                @auth
                <div class="d-flex gap-2">
                    <div class="dropdown">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                @else
                <div class="d-flex gap-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                </div>
                @endauth
            </div>
        </div>
    </nav>
    <div class="container my-1">

        @yield('content')

    </div>

    <footer class=" bg-dark text-white pt-5 pb-4 mt-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-5">
                    <h4 class="fw-bold text-warning">AssetMarket</h4>
                    <p class="text-secondary small">Premium digital assets for creators, developers & designers. Best
                        Bootstrap design — no custom CSS, only pure Bootstrap.</p>
                </div>
                <div class="col-md-3 offset-md-1">
                    <h6 class="fw-semibold">Explore</h6>
                    <ul class="list-unstyled small">
                        <li><a href="#" class="text-white-50 text-decoration-none">Graphics</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Templates</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">3D & AR</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Fonts</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6 class="fw-semibold">Company</h6>
                    <ul class="list-unstyled small">
                        <li><a href="#" class="text-white-50 text-decoration-none">About</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Licenses</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Contact</a></li>
                    </ul>
                </div>
            </div>
            <hr class="border-secondary">
            <div class="text-center small text-secondary">
                © 2026 AssetMarket – best Bootstrap design. All rights reserved.
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>