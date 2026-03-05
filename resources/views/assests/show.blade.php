@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb bg-white p-3 rounded-3 shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $asset->title }}</li>
    </ol>
</nav>
<div class="row g-4">
    <div class="col-lg-8">
        <div class="bg-white p-2 rounded-4 shadow-sm mb-4">
            @if($asset->attachments && $asset->attachments->count() > 0)
            <div id="assetCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded-3">
                    @foreach($asset->attachments as $index => $attachment)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        @if($attachment->preview_image)
                        <img src="{{ route('attachments.image', $attachment) }}" class="d-block w-100 rounded-3"
                            alt="{{ $asset->title }} preview {{ $index + 1 }}"
                            style="max-height: 400px; object-fit: cover;">
                        @else
                        <img src="https://placehold.co/1200x630/1e2a3a/ffffff?text={{ urlencode($asset->title) }}"
                            class="d-block w-100 rounded-3" alt="{{ $asset->title }}">
                        @endif
                    </div>
                    @endforeach
                </div>
                @if($asset->attachments->count() > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#assetCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#assetCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                @endif
            </div>
            @else
            <img src="{{ $asset->thumbnail ? route('assets.thumbnail', $asset) : 'https://placehold.co/1200x630/1e2a3a/ffffff?text=' . urlencode($asset->title) }}"
                class="img-fluid rounded-3 w-100" alt="{{ $asset->title }}">
            @endif
        </div>

        <div class="bg-white p-4 rounded-4 shadow-sm mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
                <h1 class="h2 fw-bold mb-0">{{ $asset->title }}</h1>
            </div>
            <h3 class="h4 fw-semibold mb-3">📄 Description</h3>
            @if($asset->description)
            <p>{{ $asset->description }}</p>
            @endif
        </div>

        @if($asset->tech_json && count($asset->tech_json) > 0)
        <div class="bg-white p-4 rounded-4 shadow-sm mb-4">
            <h3 class="h4 fw-semibold mb-3">⚙️ Technical Details</h3>
            <div class="row g-3">
                @foreach($asset->tech_json as $key => $value)
                <div class="col-md-6">
                    <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded-3">
                        <span class="fw-semibold text-capitalize">{{ str_replace('_', ' ', $key) }}:</span>
                        <span class="text-primary">{{ $value }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="bg-white p-4 rounded-4 shadow-sm">
            <h3 class="h4 fw-semibold mb-3">📋 Item details</h3>
            <table class="table table-borderless align-middle">
                <tbody>
                    <tr>
                        <th style="width: 35%;" class="text-secondary">Category</th>
                        <td>{{ $asset->category->name ?? 'Website Templates / Business' }}</td>
                    </tr>
                    <tr>
                        <th class="text-secondary">Compatible browsers</th>
                        <td>Chrome, Firefox, Safari, Edge</td>
                    </tr>
                    <tr>
                        <th class="text-secondary">Created / updated</th>
                        <td>{{ $asset->created_at ? $asset->created_at->format('F Y') : 'January 2026' }} /
                            {{ $asset->updated_at ? $asset->updated_at->format('F Y') : 'February 2026' }}</td>
                    </tr>
                    <tr>
                        <th class="text-secondary">Author</th>
                        <td class="text-decoration-none fw-semibold">Manikandaprabu Venugopal</td>
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
                        <span class="display-4 fw-bold text-dark">${{ $asset->price ?? 'Free' }}</span>
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