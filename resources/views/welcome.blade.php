<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'AssetMarket') }} - Premium Digital Assets</title>

    <!-- Bootstrap 5 (only CSS, no custom styles) - mobile first, fully responsive -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (optional, for visual enhancement) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-white">

    <!-- 
        PROFESSIONAL MARKETING HOMEPAGE – Bootstrap only, FULLY RESPONSIVE.
        LOGIN & SIGNUP BUTTONS added to header as requested.
        All Laravel dynamic auth links preserved. Works perfectly on mobile, tablet, desktop.
    -->

    <!-- Navbar (responsive: collapses on mobile) with LOGIN & SIGNUP buttons -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="#">
                <i class="bi bi-grid-fill text-warning me-2"></i>{{ config('app.name', 'AssetMarket') }}
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-medium">
                    <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Templates</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Graphics</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">3D Assets</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Fonts</a></li>
                </ul>
                <div class="d-flex gap-2">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-outline-light rounded-pill px-4">
                        <i class="bi bi-speedometer2 me-2"></i>Dashboard
                    </a>
                    @else
                    <!-- LOGIN BUTTON -->
                    <a href="{{ route('login') }}" class="btn btn-outline-light rounded-pill px-4">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Log in
                    </a>
                    <!-- SIGNUP BUTTON -->
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-warning rounded-pill px-4">
                        <i class="bi bi-person-plus me-2"></i>Sign up
                    </a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION (fully responsive) -->
    <section class="bg-dark text-white py-4 py-md-5 py-xl-6">
        <div class="container py-2 py-lg-4">
            <div class="row align-items-center g-4 g-lg-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-4 display-md-3 fw-bold mb-3 mb-md-4">Sell & buy <span
                            class="text-warning">premium digital assets</span></h1>
                    <p class="lead text-white-50 mb-3 mb-md-4 mx-auto mx-lg-0" style="max-width: 600px;">Join the
                        marketplace where creators and developers find high-quality templates, graphics, 3D models, and
                        more. Start selling today or discover your next project asset.</p>
                    <div
                        class="d-flex flex-column flex-sm-row gap-2 gap-sm-3 justify-content-center justify-content-lg-start mb-3 mb-md-4">
                        <a href="#" class="btn btn-warning btn-lg px-4 px-md-5 py-2 py-md-3 fw-semibold rounded-pill">
                            <i class="bi bi-bag-plus me-2"></i>Start Selling
                        </a>
                        <a href="#"
                            class="btn btn-outline-light btn-lg px-4 px-md-5 py-2 py-md-3 fw-semibold rounded-pill">
                            <i class="bi bi-search me-2"></i>Browse Assets
                        </a>
                    </div>
                    <div
                        class="d-flex flex-wrap gap-3 gap-md-4 justify-content-center justify-content-lg-start text-white-50">
                        <span><i class="bi bi-check-circle-fill text-warning me-2"></i>10k+ assets</span>
                        <span><i class="bi bi-check-circle-fill text-warning me-2"></i>5k+ creators</span>
                        <span><i class="bi bi-check-circle-fill text-warning me-2"></i>30-day guarantee</span>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="bg-warning bg-opacity-10 p-4 p-md-5 rounded-4">
                        <i class="bi bi-boxes text-warning"
                            style="font-size: 8rem; font-size: clamp(6rem, 15vw, 12rem);"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURED CATEGORIES (responsive grid) -->
    <section class="py-4 py-md-5">
        <div class="container py-2 py-lg-4">
            <div class="text-center mb-4 mb-md-5">
                <h2 class="display-5 fw-bold">Browse by <span class="text-warning">category</span></h2>
                <p class="text-secondary col-12 col-md-8 col-lg-6 mx-auto px-3">Thousands of premium assets, organized
                    for your next creative project.</p>
            </div>
            <div class="row g-3 g-md-4">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-3 p-md-4">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 p-md-4 mb-2 mb-md-3">
                                <i class="bi bi-code-slash text-warning fs-1"></i>
                            </div>
                            <h4 class="fw-bold">Templates</h4>
                            <p class="text-secondary small mb-3">Website templates, email templates, admin dashboards,
                                and more.</p>
                            <a href="#" class="btn btn-outline-dark rounded-pill px-3 px-md-4 mt-2">Browse <i
                                    class="bi bi-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-3 p-md-4">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 p-md-4 mb-2 mb-md-3">
                                <i class="bi bi-brush text-warning fs-1"></i>
                            </div>
                            <h4 class="fw-bold">Graphics</h4>
                            <p class="text-secondary small mb-3">Icons, illustrations, UI kits, social media packs, and
                                branding.</p>
                            <a href="#" class="btn btn-outline-dark rounded-pill px-3 px-md-4 mt-2">Browse <i
                                    class="bi bi-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-3 p-md-4">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 p-md-4 mb-2 mb-md-3">
                                <i class="bi bi-cube text-warning fs-1"></i>
                            </div>
                            <h4 class="fw-bold">3D Assets</h4>
                            <p class="text-secondary small mb-3">Models, textures, environments, and 3D UI elements.</p>
                            <a href="#" class="btn btn-outline-dark rounded-pill px-3 px-md-4 mt-2">Browse <i
                                    class="bi bi-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-3 p-md-4">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 p-md-4 mb-2 mb-md-3">
                                <i class="bi bi-fonts text-warning fs-1"></i>
                            </div>
                            <h4 class="fw-bold">Fonts</h4>
                            <p class="text-secondary small mb-3">Professional fonts for print, web, and branding
                                projects.</p>
                            <a href="#" class="btn btn-outline-dark rounded-pill px-3 px-md-4 mt-2">Browse <i
                                    class="bi bi-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-3 p-md-4">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 p-md-4 mb-2 mb-md-3">
                                <i class="bi bi-camera-reels text-warning fs-1"></i>
                            </div>
                            <h4 class="fw-bold">Video & Audio</h4>
                            <p class="text-secondary small mb-3">Stock footage, music tracks, sound effects, and
                                presets.</p>
                            <a href="#" class="btn btn-outline-dark rounded-pill px-3 px-md-4 mt-2">Browse <i
                                    class="bi bi-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-3 p-md-4">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 p-md-4 mb-2 mb-md-3">
                                <i class="bi bi-plug text-warning fs-1"></i>
                            </div>
                            <h4 class="fw-bold">Plugins</h4>
                            <p class="text-secondary small mb-3">WordPress, jQuery, Figma plugins, and extensions.</p>
                            <a href="#" class="btn btn-outline-dark rounded-pill px-3 px-md-4 mt-2">Browse <i
                                    class="bi bi-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURED ASSETS (fully responsive grid) -->
    <section class="bg-light py-4 py-md-5">
        <div class="container py-2 py-lg-4">
            <div class="text-center mb-4 mb-md-5">
                <h2 class="display-5 fw-bold">Trending <span class="text-warning">assets</span></h2>
                <p class="text-secondary col-12 col-md-8 col-lg-6 mx-auto px-3">Most popular items among our community
                    this week.</p>
            </div>
            <div class="row g-3 g-md-4">
                <!-- Asset Card 1 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="https://placehold.co/600x400/2b2b2b/ffffff?text=Admin+Template" class="card-img-top"
                            alt="Admin Template">
                        <div class="card-body p-3">
                            <span class="badge bg-warning text-dark mb-2">BESTSELLER</span>
                            <h5 class="fw-bold mb-1 small">Admin Dashboard Pro</h5>
                            <p class="text-secondary small mb-0">Bootstrap 5, dark mode, charts</p>
                        </div>
                        <div
                            class="card-footer bg-white border-0 d-flex justify-content-between align-items-center pb-3 px-3">
                            <span class="h5 fw-bold mb-0">$49</span>
                            <a href="#" class="btn btn-sm btn-dark rounded-pill px-3">Buy now</a>
                        </div>
                    </div>
                </div>
                <!-- Asset Card 2 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="https://placehold.co/600x400/0d6efd/ffffff?text=3D+Character" class="card-img-top"
                            alt="3D Character">
                        <div class="card-body p-3">
                            <span class="badge bg-info text-white mb-2">NEW</span>
                            <h5 class="fw-bold mb-1 small">Fantasy Character Pack</h5>
                            <p class="text-secondary small mb-0">High-poly, rigged, Blender</p>
                        </div>
                        <div
                            class="card-footer bg-white border-0 d-flex justify-content-between align-items-center pb-3 px-3">
                            <span class="h5 fw-bold mb-0">$89</span>
                            <a href="#" class="btn btn-sm btn-dark rounded-pill px-3">Buy now</a>
                        </div>
                    </div>
                </div>
                <!-- Asset Card 3 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="https://placehold.co/600x400/198754/ffffff?text=Icon+Set" class="card-img-top"
                            alt="Icon Set">
                        <div class="card-body p-3">
                            <span class="badge bg-danger text-white mb-2">HOT</span>
                            <h5 class="fw-bold mb-1 small">Nova 2400 Icons</h5>
                            <p class="text-secondary small mb-0">SVG, Figma, 24 categories</p>
                        </div>
                        <div
                            class="card-footer bg-white border-0 d-flex justify-content-between align-items-center pb-3 px-3">
                            <span class="h5 fw-bold mb-0">$35</span>
                            <a href="#" class="btn btn-sm btn-dark rounded-pill px-3">Buy now</a>
                        </div>
                    </div>
                </div>
                <!-- Asset Card 4 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="https://placehold.co/600x400/6f42c1/ffffff?text=Portfolio" class="card-img-top"
                            alt="Portfolio">
                        <div class="card-body p-3">
                            <span class="badge bg-warning text-dark mb-2">BESTSELLER</span>
                            <h5 class="fw-bold mb-1 small">Minimal Portfolio</h5>
                            <p class="text-secondary small mb-0">Astro, responsive, blog ready</p>
                        </div>
                        <div
                            class="card-footer bg-white border-0 d-flex justify-content-between align-items-center pb-3 px-3">
                            <span class="h5 fw-bold mb-0">$29</span>
                            <a href="#" class="btn btn-sm btn-dark rounded-pill px-3">Buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4 mt-md-5">
                <a href="#" class="btn btn-outline-dark btn-lg px-4 px-md-5 rounded-pill">
                    View all assets <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- SELLER BENEFITS (responsive stacked on mobile) -->
    <section class="py-4 py-md-5">
        <div class="container py-2 py-lg-4">
            <div class="row align-items-center g-4 g-lg-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-3 mb-md-4">Sell your work to <span
                            class="text-warning">thousands</span> of buyers</h2>
                    <p class="text-secondary lead mb-4">Join our community of creators and earn passive income from your
                        digital products.</p>
                    <div class="d-flex mb-3 mb-md-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle p-2 p-md-3 me-3 flex-shrink-0">
                            <i class="bi bi-percent text-warning fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold">70-80% royalty rate</h5>
                            <p class="text-secondary small mb-0">Keep most of your earnings with our creator-friendly
                                commission.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3 mb-md-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle p-2 p-md-3 me-3 flex-shrink-0">
                            <i class="bi bi-globe text-warning fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold">Global audience</h5>
                            <p class="text-secondary small mb-0">Reach buyers from over 150 countries.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3 mb-md-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle p-2 p-md-3 me-3 flex-shrink-0">
                            <i class="bi bi-shield-check text-warning fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold">Protected payments</h5>
                            <p class="text-secondary small mb-0">Secure transactions and fraud protection.</p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-warning btn-lg px-4 px-md-5 py-2 py-md-3 fw-semibold rounded-pill mt-2">
                        <i class="bi bi-person-plus me-2"></i>Become a seller
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="bg-dark p-4 p-md-5 rounded-4 text-white">
                        <div class="d-flex align-items-center mb-3 mb-md-4">
                            <i class="bi bi-quote fs-1 text-warning me-3"></i>
                            <p class="lead mb-0 small">"I've earned over $50k selling my templates here. Best decision
                                ever!"</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="https://placehold.co/60x60/2b2b2b/ffffff?text=JD" class="rounded-circle me-3"
                                width="50" alt="avatar">
                            <div>
                                <h6 class="fw-bold mb-0">John Doe</h6>
                                <small class="text-white-50">Top seller, 200+ sales</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA BANNER (responsive padding) -->
    <section class="bg-warning py-4 py-md-5">
        <div class="container py-2 py-md-4 text-center">
            <h2 class="display-5 fw-bold text-dark mb-3 mb-md-4">Ready to start your creative journey?</h2>
            <p class="lead text-dark mb-4 mb-md-5 col-12 col-md-8 col-lg-6 mx-auto px-3">Join
                {{ config('app.name', 'AssetMarket') }} today and discover thousands of premium assets or start selling
                your own.</p>
            <div class="d-flex flex-column flex-sm-row gap-2 gap-sm-3 justify-content-center">
                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="btn btn-dark btn-lg px-4 px-md-5 py-2 py-md-3 fw-semibold rounded-pill">
                    <i class="bi bi-person-plus me-2"></i>Sign up for free
                </a>
                @endif
                <a href="#" class="btn btn-outline-dark btn-lg px-4 px-md-5 py-2 py-md-3 fw-semibold rounded-pill">
                    Learn more
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER (responsive columns) -->
    <footer class="bg-dark text-white py-4 py-md-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <h4 class="fw-bold text-warning mb-3">{{ config('app.name', 'AssetMarket') }}</h4>
                    <p class="text-white-50 small">The premier marketplace for digital creators. Sell and buy
                        high-quality assets with confidence.</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white-50 fs-5"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="text-white-50 fs-5"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white-50 fs-5"><i class="bi bi-github"></i></a>
                        <a href="#" class="text-white-50 fs-5"><i class="bi bi-discord"></i></a>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h6 class="fw-bold text-white mb-3">Marketplace</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">All assets</a>
                        </li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Categories</a>
                        </li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Trending</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">New releases</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h6 class="fw-bold text-white mb-3">Sell</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Become a
                                seller</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Seller guide</a>
                        </li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Royalties</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Success
                                stories</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h6 class="fw-bold text-white mb-3">Support</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Help center</a>
                        </li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Contact us</a>
                        </li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Terms</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Privacy</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h6 class="fw-bold text-white mb-3">Company</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">About us</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Blog</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Careers</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none small">Press</a></li>
                    </ul>
                </div>
            </div>
            <hr class="border-secondary">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <p class="text-white-50 small mb-0">© {{ date('Y') }} {{ config('app.name', 'AssetMarket') }}. All
                    rights reserved.</p>
                <p class="text-white-50 small mb-0">Laravel v{{ Illuminate\Foundation\Application::VERSION }} | PHP
                    {{ PHP_VERSION }}</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS (for navbar toggler) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>