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

<div class="row g-4">
    @forelse($assets as $asset)
    <div class="col-sm-6 col-lg-4 col-xl-3">
        <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
            <a href="{{ route('assets.show', $asset) }}" class="d-block">
                <img src="{{ route('assets.thumbnail', $asset) }}" class="card-img-top"
                    style="width: 300px; height: 200px; object-fit: cover;" alt="{{ $asset->title }}"
                    onerror="this.src='https://placehold.co/600x400/2b2b2b/ffffff?text=No+Image'">
            </a>
            <div class="card-body pb-2">
                <div class="d-flex align-items-center mb-2">
                    @if($asset->category)
                    <span class="badge bg-light text-dark me-2">{{ $asset->category->name }}</span>
                    @endif
                    <span class="badge bg-warning text-dark">ACTIVE</span>
                </div>
                <h5 class="card-title fw-semibold mb-1">
                    <a href="{{ route('assets.show', $asset) }}" class="text-decoration-none text-dark">
                        {{ $asset->title }}
                    </a>
                </h5>
                <p class="card-text text-secondary small">{{ Str::limit($asset->description, 50) }}</p>
            </div>
            <div
                class="card-footer bg-transparent d-flex justify-content-between align-items-center border-0 pt-0 pb-3">
                <span class="h5 fw-bold text-dark mb-0">${{ $asset->price }}</span>
                <a href="{{ route('assets.download', $asset) }}"
                    class="btn btn-sm btn-dark rounded-pill px-4">Download</a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="text-center py-5">
            <h4 class="text-muted">No assets available</h4>
            <p class="text-secondary">Check back later for new assets!</p>
        </div>
    </div>
    @endforelse
</div>

@if($assets->hasPages())
<nav class="mt-5 d-flex justify-content-center" aria-label="Asset pages">
    {{ $assets->links() }}
</nav>
@endif
@endsection