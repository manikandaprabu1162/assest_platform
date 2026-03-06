@extends('layouts.app')

@section('content')
<div class="container py-5">
    {{-- Header Section with Stats --}}
    <div class="row mb-5">
        <div class="col-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between bg-light p-4 rounded-4 shadow-sm">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                        <i class="bi bi-heart-fill text-primary" style="font-size: 2rem;"></i>
                    </div>
                    <div>
                        <h1 class="display-6 fw-bold mb-1">My Wishlist</h1>
                        <p class="text-secondary mb-0">
                            <i class="bi bi-bookmarks me-1"></i>
                            {{ $wishlists->count() }} {{ Str::plural('item', $wishlists->count()) }} saved
                        </p>
                    </div>
                </div>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-primary px-4 py-2 rounded-pill">
                    <i class="bi bi-arrow-left me-2"></i>Continue Shopping
                </a>
            </div>
        </div>
    </div>

    @if($wishlists->count() > 0)
        {{-- Wishlist Items Grid --}}
        <div class="row g-4">
            @foreach($wishlists as $wishlist)
            <div class="col-lg-3 col-md-4 col-sm-6" id="wishlist-item-{{ $wishlist->asset->id }}">
                <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift transition-all">
                    
                    {{-- Image Container with Badge --}}
                    <div class="position-relative">
                        @if($wishlist->asset->attachments && $wishlist->asset->attachments->count() > 0)
                            <img src="{{ route('attachments.image', $wishlist->asset->attachments->first()) }}" 
                                 class="card-img-top rounded-top-4" 
                                 style="height: 220px; object-fit: cover;" 
                                 alt="{{ $wishlist->asset->title }}">
                        @else
                            <img src="{{ route('assets.thumbnail', $wishlist->asset) }}" 
                                 class="card-img-top rounded-top-4" 
                                 style="height: 220px; object-fit: cover; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"
                                 alt="{{ $wishlist->asset->title }}">
                        @endif
                        
                        {{-- Category Badge --}}
                        <span class="position-absolute top-0 end-0 m-3 badge bg-dark bg-opacity-75 rounded-pill px-3 py-2">
                            <i class="bi bi-tag me-1"></i>
                            {{ $wishlist->asset->category->name ?? 'Uncategorized' }}
                        </span>

                        {{-- Quick Action Buttons --}}
                        <div class="position-absolute top-0 start-0 m-3 d-flex gap-2">
                            <button class="btn btn-light btn-sm rounded-circle shadow-sm remove-wishlist" 
                                    data-asset-id="{{ $wishlist->asset->id }}"
                                    data-bs-toggle="tooltip" 
                                    title="Remove from wishlist">
                                <i class="bi bi-heart-fill text-danger"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column p-4">
                        {{-- Title and Rating --}}
                        <div class="mb-3">
                            <h5 class="card-title fw-bold mb-2">{{ $wishlist->asset->title }}</h5>
                            <div class="d-flex align-items-center small">
                                <div class="text-warning me-2">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </div>
                                <span class="text-secondary">(4.5)</span>
                            </div>
                        </div>

                        {{-- Description --}}
                        <p class="card-text text-secondary small mb-3 flex-grow-1">
                            {{ Str::limit($wishlist->asset->description, 80) }}
                        </p>

                        {{-- Price and Actions --}}
                        <div class="border-top pt-3 mt-auto">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span class="text-secondary small">Price</span>
                                    <span class="h5 fw-bold text-primary d-block">${{ number_format($wishlist->asset->price, 2) }}</span>
                                </div>
                                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                                    In Stock
                                </span>
                            </div>

                            <div class="d-grid gap-2">
                                <a href="{{ route('assets.show', $wishlist->asset) }}" 
                                   class="btn btn-primary rounded-pill py-2">
                                    <i class="bi bi-eye me-2"></i>View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination with Info --}}
        <div class="row mt-5 align-items-center">
            <div class="col-md-6 mb-3 mb-md-0">
                <p class="text-secondary mb-0">
                    Showing {{ $wishlists->firstItem() ?? 0 }} to {{ $wishlists->lastItem() ?? 0 }} 
                    of {{ $wishlists->total() }} items
                </p>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-md-end">
                    {{ $wishlists->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    @else
        {{-- Empty State - Enhanced Design --}}
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 text-center py-5">
                    <div class="card-body p-5">
                        {{-- Empty State Illustration --}}
                        <div class="mb-4 position-relative">
                            <div class="bg-light rounded-circle d-inline-block p-5">
                                <i class="bi bi-heart text-primary" style="font-size: 4rem;"></i>
                            </div>
                            <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-danger p-3">
                                0
                            </span>
                        </div>

                        <h3 class="fw-bold mb-3">Your wishlist is empty</h3>
                        <p class="text-secondary mb-4">
                            Looks like you haven't added any items to your wishlist yet. 
                            Start exploring our collection and save items you love for later.
                        </p>

                        {{-- Quick Suggestions --}}
                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <div class="bg-light rounded-3 p-3">
                                    <i class="bi bi-stars text-primary d-block mb-2" style="font-size: 1.5rem;"></i>
                                    <span class="small">New Arrivals</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-light rounded-3 p-3">
                                    <i class="bi bi-graph-up-arrow text-primary d-block mb-2" style="font-size: 1.5rem;"></i>
                                    <span class="small">Trending</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-light rounded-3 p-3">
                                    <i class="bi bi-tags text-primary d-block mb-2" style="font-size: 1.5rem;"></i>
                                    <span class="small">Special Offers</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-light rounded-3 p-3">
                                    <i class="bi bi-star text-primary d-block mb-2" style="font-size: 1.5rem;"></i>
                                    <span class="small">Top Rated</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center gap-3">
                            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg px-5 rounded-pill">
                                <i class="bi bi-compass me-2"></i>Start Exploring
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@push('styles')
<style>
    /* Custom Animations */
    .hover-lift {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 2rem rgba(0,0,0,.15) !important;
    }
    
    .transition-all {
        transition: all 0.3s ease;
    }
    
    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
    
    /* Image Overlay Effect */
    .position-relative .card-img-top {
        transition: transform 0.5s ease;
    }
    .position-relative:hover .card-img-top {
        transform: scale(1.05);
    }
    .position-relative {
        overflow: hidden;
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Remove from wishlist functionality
    $('.remove-wishlist').on('click', function(e) {
        e.preventDefault();
        var assetId = $(this).data('asset-id');
        var $btn = $(this);
        var $card = $btn.closest('.col-lg-3');

        // Show loading state
        $btn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $btn.prop('disabled', true);

        $.ajax({
            url: '/wishlist/' + assetId,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    // Fade out and remove the card
                    $card.fadeOut(300, function() {
                        $(this).remove();
                        
                        // Update the count in header
                        var remainingCount = $('.remove-wishlist').length;
                        $('.text-secondary mb-0').html('<i class="bi bi-bookmarks me-1"></i>' + remainingCount + ' ' + (remainingCount === 1 ? 'item' : 'items') + ' saved');
                        
                        // If no items left, reload page to show empty state
                        if (remainingCount === 0) {
                            setTimeout(function() {
                                location.reload();
                            }, 500);
                        }
                    });
                } else {
                    alert(response.message || 'Failed to remove from wishlist');
                    $btn.html('<i class="bi bi-heart-fill text-danger"></i>');
                    $btn.prop('disabled', false);
                }
            },
            error: function(xhr) {
                alert('Failed to remove from wishlist. Please try again.');
                $btn.html('<i class="bi bi-heart-fill text-danger"></i>');
                $btn.prop('disabled', false);
            }
        });
    });
});
</script>
@endpush