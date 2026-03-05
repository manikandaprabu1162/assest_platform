@extends('layouts.app')

@section('content')

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
            <img src="https://placehold.co/600x400/0d6efd/ffffff?text=Mobile+App+UI" class="card-img-top" alt="ui kit">
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
            <img src="https://placehold.co/600x400/6f42c1/ffffff?text=Portfolio" class="card-img-top" alt="portfolio">
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
            <img src="https://placehold.co/600x400/20c997/ffffff?text=3D+Assets" class="card-img-top" alt="3d kit">
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
            <img src="https://placehold.co/600x400/dc3545/ffffff?text=Icon+Set" class="card-img-top" alt="icons">
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
            <img src="https://placehold.co/600x400/fd7e14/ffffff?text=Email+Template" class="card-img-top" alt="email">
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

@endsection