@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb bg-white p-3 rounded-3 shadow-sm">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Templates</a></li>
        <li class="breadcrumb-item active" aria-current="page">Modern Website Template</li>
    </ol>
</nav>
<div class="row g-4">

    <div class="col-lg-8">

        <div class="bg-white p-2 rounded-4 shadow-sm mb-4">
            <img src="https://placehold.co/1200x630/1e2a3a/ffffff?text=Modern+Website+Template+Preview"
                class="img-fluid rounded-3 w-100" alt="template preview">
        </div>

        <div class="bg-white p-4 rounded-4 shadow-sm mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
                <h1 class="h2 fw-bold mb-0">Modern Website Template</h1>
            </div>
            <p class="lead text-secondary">High quality responsive website template built with Bootstrap 5.
                Perfect for business websites, startups, portfolios and agencies.</p>
        </div>

        <div class="bg-white p-4 rounded-4 shadow-sm mb-4">
            <h3 class="h4 fw-semibold mb-3">📄 Description</h3>
            <p>This professional website template comes with multiple pages and modern UI components. It is
                fully responsive and easy to customize. Built using Bootstrap framework and clean HTML
                structure.</p>
            <p class="fw-medium mb-2">✨ Features included:</p>
            <ul class="list-group list-group-flush bg-transparent mb-3">
                <li class="list-group-item bg-transparent ps-0 border-0"><span class="text-success me-2">✓</span>
                    Responsive Design (mobile, tablet, desktop)</li>
                <li class="list-group-item bg-transparent ps-0 border-0"><span class="text-success me-2">✓</span>
                    Bootstrap 5 Framework + Flexbox grid</li>
                <li class="list-group-item bg-transparent ps-0 border-0"><span class="text-success me-2">✓</span>
                    Clean HTML / CSS structure (W3C valid)</li>
                <li class="list-group-item bg-transparent ps-0 border-0"><span class="text-success me-2">✓</span>
                    Easy customization with variables</li>
                <li class="list-group-item bg-transparent ps-0 border-0"><span class="text-success me-2">✓</span>
                    Cross‑browser compatible (Chrome, Firefox, Safari,
                    Edge)</li>
            </ul>
        </div>

        <div class="bg-white p-4 rounded-4 shadow-sm">
            <h3 class="h4 fw-semibold mb-3">📋 Item details</h3>
            <table class="table table-borderless align-middle">
                <tbody>
                    <tr>
                        <th style="width: 35%;" class="text-secondary">Category</th>
                        <td>Website Templates / Business</td>
                    </tr>
                    <tr>
                        <th class="text-secondary">Compatible browsers</th>
                        <td>Chrome, Firefox, Safari, Edge</td>
                    </tr>
                    <tr>
                        <th class="text-secondary">Created / updated</th>
                        <td>January 2026 / February 2026</td>
                    </tr>
                    <tr>
                        <th class="text-secondary">Author</th>
                        <td><a href="#" class="text-decoration-none fw-semibold">John Developer</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <h5 class="fw-semibold">🔍 Similar assets</h5>
            <div class="row g-3 mt-2">
                <div class="col-6 col-md-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="https://placehold.co/200x150/2c3e50/ffffff?text=Startup+Kit"
                            class="card-img-top rounded-top" alt="startup">
                        <div class="card-body p-2"><small class="fw-semibold">Startup kit</small></div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="https://placehold.co/200x150/1e4a6f/ffffff?text=Admin+Pro"
                            class="card-img-top rounded-top" alt="admin">
                        <div class="card-body p-2"><small class="fw-semibold">Admin Pro</small></div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="https://placehold.co/200x150/6f42c1/ffffff?text=Portfolio"
                            class="card-img-top rounded-top" alt="portfolio">
                        <div class="card-body p-2"><small class="fw-semibold">Portfolio</small></div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="https://placehold.co/200x150/d35400/ffffff?text=Landing"
                            class="card-img-top rounded-top" alt="landing">
                        <div class="card-body p-2"><small class="fw-semibold">Landing page</small></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">


        <div class="position-sticky" style="top: 90px;">
            <div class="card border-0 shadow-lg rounded-4 mb-4 overflow-hidden">
                <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
                    <span class="badge bg-success mb-2">instant download</span>
                </div>
                <div class="card-body px-4">
                    <div class="d-flex align-items-baseline gap-2 mb-4">
                        <span class="display-4 fw-bold text-dark">$19</span>
                        <span class="text-secondary">one‑time payment</span>
                    </div>
                    <button class="btn btn-warning btn-lg w-100 fw-semibold mb-3 py-3 rounded-3">💳 Buy
                        now</button>
                    <button class="btn btn-outline-secondary w-100 mb-4 py-2 rounded-3">❤️ Add to
                        wishlist</button>
                    <div class="small text-secondary">
                        <span>🔒 Secure transaction</span> · <span>Future updates included</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection