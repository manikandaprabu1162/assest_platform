@extends('layouts.app')

@section('content')

<div class="row justify-content-center mb-5">
    <div class="col-12 col-lg-8">
        <div class="bg-white p-3 p-md-4 rounded-4 shadow border">
            <form class="d-flex gap-2" role="search">
                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-light border-0">
                        <i class="bi bi-search"></i>
                    </span>
                    <input class="form-control form-control-lg bg-light border-0" type="search"
                        placeholder="Search assets, templates, plugins… e.g. 'bootstrap admin'" aria-label="Search">
                </div>
                <button class="btn btn-lg btn-warning px-4 px-xl-5 fw-semibold rounded-3" type="submit">
                    <i class="bi bi-arrow-right-circle me-2"></i>Search
                </button>
            </form>
        </div>
        <div class="d-flex flex-wrap gap-2 mt-3 justify-content-center">
            <span class="badge bg-light text-dark py-2 px-3 rounded-pill">Bootstrap 5</span>
            <span class="badge bg-light text-dark py-2 px-3 rounded-pill">React</span>
            <span class="badge bg-light text-dark py-2 px-3 rounded-pill">Laravel</span>
            <span class="badge bg-light text-dark py-2 px-3 rounded-pill">Admin</span>
            <span class="badge bg-light text-dark py-2 px-3 rounded-pill">UI Kit</span>
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
                <div class="d-flex gap-2">
                    <a href="{{ route('assets.download', $asset) }}"
                        class="btn btn-sm btn-dark rounded-pill px-4">Download</a>
                    @auth
                    <button class="btn btn-sm btn-outline-danger wishlist-btn-dashboard" 
                            data-asset-id="{{ $asset->id }}" 
                            data-in-wishlist="{{ \App\Models\Wishlist::where('user_id', Auth::id())->where('asset_id', $asset->id)->exists() ? 'true' : 'false' }}"
                            title="Add to wishlist">
                        <i class="bi bi-heart{{ \App\Models\Wishlist::where('user_id', Auth::id())->where('asset_id', $asset->id)->exists() ? '-fill' : '' }}"></i>
                    </button>
                    @endauth
                </div>
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

@push('scripts')
<script>
$(document).ready(function() {
    // Wishlist button functionality for dashboard
    $('.wishlist-btn-dashboard').on('click', function(e) {
        e.preventDefault();
        var $btn = $(this);
        var assetId = $btn.data('asset-id');
        var inWishlist = $btn.data('in-wishlist') === 'true';

        if (inWishlist) {
            // Remove from wishlist
            $.ajax({
                url: '/wishlist/' + assetId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        $btn.data('in-wishlist', 'false');
                        $btn.html('<i class="bi bi-heart"></i>');
                    }
                },
                error: function() {
                    alert('Failed to remove from wishlist.');
                }
            });
        } else {
            // Add to wishlist
            $.ajax({
                url: '/wishlist/add',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    asset_id: assetId
                },
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        $btn.data('in-wishlist', 'true');
                        $btn.html('<i class="bi bi-heart-fill"></i>');
                    }
                },
                error: function() {
                    alert('Failed to add to wishlist.');
                }
            });
        }
    });
});
</script>
@endpush
