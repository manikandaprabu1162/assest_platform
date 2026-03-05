<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AssetMarket — best design, Bootstrap only</title>
    <!-- Bootstrap 5 (no custom CSS, no extra libraries) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- 
        NAVBAR – best Bootstrap only, dark with brand & toggler 
        (no custom styles, pure Bootstrap classes)
    -->
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
                    <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Categories</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Popular</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">New</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Support</a></li>
                </ul>
                <div class="d-flex">
                    <a href="#" class="btn btn-outline-light me-2 rounded-pill px-4">Log in</a>
                    <a href="#" class="btn btn-warning rounded-pill px-4">Sign up</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT: search + cards (Bootstrap only, best spacing) -->
    <main class="container my-5">

        <!-- 
            SEARCH SECTION – large, clean input group, no extra css 
            (full width on mobile, centered on larger)
        -->
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-lg-8">
                <div class="bg-white p-3 p-md-4 rounded-4 shadow-sm border">
                    <form class="d-flex gap-2" role="search">
                        <input class="form-control form-control-lg rounded-3 border-0 bg-light" type="search"
                            placeholder="Search assets, templates, plugins… e.g. 'bootstrap admin'" aria-label="Search">
                        <button class="btn btn-lg btn-warning px-4 px-xl-5 fw-semibold rounded-3" type="submit">🔍
                            Search</button>
                    </form>
                    <div class="d-flex gap-3 mt-3 small text-secondary flex-wrap">
                        <span>🔥 Trending: </span>
                        <a href="#" class="text-decoration-none">Admin</a>
                        <a href="#" class="text-decoration-none">UI kit</a>
                        <a href="#" class="text-decoration-none">3D</a>
                        <a href="#" class="text-decoration-none">Fonts</a>
                        <a href="#" class="text-decoration-none">Mockups</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 
            ASSET CARDS – pure Bootstrap grid with cards 
            (no custom CSS, every class is Bootstrap or native)
        -->
        <div class="row g-4">

            <!-- card 1 – best design using only bootstrap utilities -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                    <img src="https://placehold.co/600x400/2b2b2b/ffffff?text=Website+Template" class="card-img-top"
                        alt="template preview">
                    <div class="card-body pb-2">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-warning text-dark me-2">BESTSELLER</span>
                            <span class="badge bg-light text-dark">HTML</span>
                        </div>
                        <h5 class="card-title fw-semibold mb-1">Vexa – Business Template</h5>
                        <p class="card-text text-secondary small">Bootstrap 5, dark mode, 50+ sections</p>
                    </div>
                    <div
                        class="card-footer bg-transparent d-flex justify-content-between align-items-center border-0 pt-0 pb-3">
                        <span class="h5 fw-bold text-dark mb-0">$24</span>
                        <a href="#" class="btn btn-sm btn-dark rounded-pill px-4">Buy now</a>
                    </div>
                </div>
            </div>

            <!-- card 2 -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                    <img src="https://placehold.co/600x400/0d6efd/ffffff?text=Mobile+App+UI" class="card-img-top"
                        alt="ui kit">
                    <div class="card-body pb-2">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-info text-white me-2">NEW</span>
                            <span class="badge bg-light text-dark">Figma</span>
                        </div>
                        <h5 class="card-title fw-semibold mb-1">FlowBank – finance UI</h5>
                        <p class="card-text text-secondary small">400+ components, iOS & Android</p>
                    </div>
                    <div
                        class="card-footer bg-transparent d-flex justify-content-between align-items-center border-0 pt-0 pb-3">
                        <span class="h5 fw-bold text-dark mb-0">$39</span>
                        <a href="#" class="btn btn-sm btn-dark rounded-pill px-4">Buy now</a>
                    </div>
                </div>
            </div>

            <!-- card 3 -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                    <img src="https://placehold.co/600x400/198754/ffffff?text=Admin+Dash" class="card-img-top"
                        alt="admin dashboard">
                    <div class="card-body pb-2">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-danger text-white me-2">HOT</span>
                            <span class="badge bg-light text-dark">React</span>
                        </div>
                        <h5 class="card-title fw-semibold mb-1">Enigma – dashboard kit</h5>
                        <p class="card-text text-secondary small">charts, tables, dark/light</p>
                    </div>
                    <div
                        class="card-footer bg-transparent d-flex justify-content-between align-items-center border-0 pt-0 pb-3">
                        <span class="h5 fw-bold text-dark mb-0">$49</span>
                        <a href="#" class="btn btn-sm btn-dark rounded-pill px-4">Buy now</a>
                    </div>
                </div>
            </div>

            <!-- card 4 -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                    <img src="https://placehold.co/600x400/6f42c1/ffffff?text=Portfolio" class="card-img-top"
                        alt="portfolio">
                    <div class="card-body pb-2">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-warning text-dark me-2">BESTSELLER</span>
                            <span class="badge bg-light text-dark">Astro</span>
                        </div>
                        <h5 class="card-title fw-semibold mb-1">Folio – minimal portfolio</h5>
                        <p class="card-text text-secondary small">grid, case studies, blog</p>
                    </div>
                    <div
                        class="card-footer bg-transparent d-flex justify-content-between align-items-center border-0 pt-0 pb-3">
                        <span class="h5 fw-bold text-dark mb-0">$19</span>
                        <a href="#" class="btn btn-sm btn-dark rounded-pill px-4">Buy now</a>
                    </div>
                </div>
            </div>

            <!-- card 5 (extra to show 8 cards, better grid) -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                    <img src="https://placehold.co/600x400/20c997/ffffff?text=3D+Assets" class="card-img-top"
                        alt="3d kit">
                    <div class="card-body pb-2">
                        <span class="badge bg-secondary text-white mb-2">BLENDER</span>
                        <h5 class="card-title fw-semibold mb-1">Cyber props pack</h5>
                        <p class="card-text text-secondary small">20 high‑quality 3D models</p>
                    </div>
                    <div
                        class="card-footer bg-transparent d-flex justify-content-between align-items-center border-0 pt-0 pb-3">
                        <span class="h5 fw-bold text-dark mb-0">$59</span>
                        <a href="#" class="btn btn-sm btn-dark rounded-pill px-4">Buy now</a>
                    </div>
                </div>
            </div>

            <!-- card 6 -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                    <img src="https://placehold.co/600x400/dc3545/ffffff?text=Icon+Set" class="card-img-top"
                        alt="icons">
                    <div class="card-body pb-2">
                        <span class="badge bg-light text-dark mb-2">SVG</span>
                        <h5 class="card-title fw-semibold mb-1">Nova 2400 icons</h5>
                        <p class="card-text text-secondary small">24 categories, customizable</p>
                    </div>
                    <div
                        class="card-footer bg-transparent d-flex justify-content-between align-items-center border-0 pt-0 pb-3">
                        <span class="h5 fw-bold text-dark mb-0">$35</span>
                        <a href="#" class="btn btn-sm btn-dark rounded-pill px-4">Buy now</a>
                    </div>
                </div>
            </div>

            <!-- card 7 -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                    <img src="https://placehold.co/600x400/fd7e14/ffffff?text=Email+Template" class="card-img-top"
                        alt="email">
                    <div class="card-body pb-2">
                        <span class="badge bg-light text-dark mb-2">MJML</span>
                        <h5 class="card-title fw-semibold mb-1">Inbox‑pro emails</h5>
                        <p class="card-text text-secondary small">15 responsive templates</p>
                    </div>
                    <div
                        class="card-footer bg-transparent d-flex justify-content-between align-items-center border-0 pt-0 pb-3">
                        <span class="h5 fw-bold text-dark mb-0">$18</span>
                        <a href="#" class="btn btn-sm btn-dark rounded-pill px-4">Buy now</a>
                    </div>
                </div>
            </div>

            <!-- card 8 -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                    <img src="https://placehold.co/600x400/0b5e7b/ffffff?text=Plugin" class="card-img-top" alt="plugin">
                    <div class="card-body pb-2">
                        <span class="badge bg-primary text-white mb-2">jQuery</span>
                        <h5 class="card-title fw-semibold mb-1">Advanced slider+</h5>
                        <p class="card-text text-secondary small">parallax, 60+ effects</p>
                    </div>
                    <div
                        class="card-footer bg-transparent d-flex justify-content-between align-items-center border-0 pt-0 pb-3">
                        <span class="h5 fw-bold text-dark mb-0">$12</span>
                        <a href="#" class="btn btn-sm btn-dark rounded-pill px-4">Buy now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 
            PAGINATION (Bootstrap only) – centered, responsive 
        -->
        <nav class="mt-5 d-flex justify-content-center" aria-label="Asset pages">
            <ul class="pagination pagination-md">
                <li class="page-item disabled"><span class="page-link border-0 bg-light text-secondary">«</span></li>
                <li class="page-item active" aria-current="page"><span
                        class="page-link bg-warning text-dark border-0 fw-bold">1</span></li>
                <li class="page-item"><a class="page-link border-0 bg-light text-dark" href="#">2</a></li>
                <li class="page-item"><a class="page-link border-0 bg-light text-dark" href="#">3</a></li>
                <li class="page-item"><a class="page-link border-0 bg-light text-dark" href="#">4</a></li>
                <li class="page-item"><a class="page-link border-0 bg-light text-dark" href="#">5</a></li>
                <li class="page-item"><a class="page-link border-0 bg-light text-dark" href="#">»</a></li>
            </ul>
        </nav>

    </main>

    <!-- 
        FOOTER – Bootstrap only, dark, simple, responsive 
    -->
    <footer class="bg-dark text-white pt-5 pb-4 mt-5">
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

    <!-- Bootstrap JS for toggler & collapse (required) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>