@extends('layouts.app')

@section('content')
<div class="container py-5">
    {{-- Header Section with Stats --}}
    <div class="row mb-5">
        <div class="col-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between bg-gradient-primary text-white p-4 rounded-4 shadow-lg" 
                 style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="d-flex align-items-center gap-4">
                    <div class="bg-white bg-opacity-25 p-3 rounded-3 backdrop-blur">
                        <i class="bi bi-bag-check-fill" style="font-size: 2.5rem;"></i>
                    </div>
                    <div>
                        <h1 class="display-6 fw-bold mb-1">My Purchases</h1>
                        <div class="d-flex gap-4 mt-2">
                            <div class="text-white-50">
                                <i class="bi bi-box-seam me-1"></i>
                                Total Items: <span class="fw-bold text-white">{{ $purchases->total() }}</span>
                            </div>
                            <div class="text-white-50">
                                <i class="bi bi-currency-rupee me-1"></i>
                                Total Spent: <span class="fw-bold text-white">₹{{ number_format($purchases->sum('price'), 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('dashboard') }}" class="btn btn-light px-4 py-2 rounded-pill shadow-sm">
                    <i class="bi bi-plus-circle me-2"></i>Browse More Assets
                </a>
            </div>
        </div>
    </div>

    @if($purchases->count() > 0)
        {{-- Filters and Search --}}
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-primary rounded-start-pill active">
                        <i class="bi bi-grid-3x3-gap-fill me-2"></i>All Items
                    </button>
                    <button type="button" class="btn btn-outline-primary">
                        <i class="bi bi-calendar-week me-2"></i>This Month
                    </button>
                    <button type="button" class="btn btn-outline-primary rounded-end-pill">
                        <i class="bi bi-calendar3 me-2"></i>Last 3 Months
                    </button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group rounded-pill shadow-sm">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search text-primary"></i>
                    </span>
                    <input type="text" class="form-control border-start-0 rounded-pill" 
                           placeholder="Search your purchases..." id="searchPurchases">
                </div>
            </div>
        </div>

        {{-- Purchases Grid --}}
        <div class="row g-4" id="purchasesContainer">
            @foreach($purchases as $purchase)
            <div class="col-lg-4 col-md-6 purchase-item">
                <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift transition-all overflow-hidden">
                    
                    {{-- Image Section with Overlay --}}
                    <div class="position-relative">
                        @if($purchase->asset->attachments && $purchase->asset->attachments->count() > 0)
                            <img src="{{ route('attachments.image', $purchase->asset->attachments->first()) }}" 
                                 class="card-img-top" 
                                 alt="{{ $purchase->asset->title }}" 
                                 style="height: 220px; object-fit: cover;">
                        @elseif($purchase->asset->thumbnail)
                            <img src="{{ route('assets.thumbnail', $purchase->asset) }}" 
                                 class="card-img-top" 
                                 alt="{{ $purchase->asset->title }}" 
                                 style="height: 220px; object-fit: cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                 style="height: 220px; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
                                <div class="text-center">
                                    <i class="bi bi-image text-primary opacity-50" style="font-size: 3rem;"></i>
                                    <p class="text-muted small mt-2">No preview available</p>
                                </div>
                            </div>
                        @endif
                        
                        {{-- Purchase Badge --}}
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge bg-success bg-opacity-90 rounded-pill px-3 py-2 shadow-sm">
                                <i class="bi bi-check-circle-fill me-1"></i>Purchased
                            </span>
                        </div>
                        
                        {{-- Asset Type Badge --}}
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-dark bg-opacity-75 rounded-pill px-3 py-2">
                                <i class="bi bi-tag me-1"></i>
                                {{ $purchase->asset->category->name ?? 'Asset' }}
                            </span>
                        </div>
                    </div>

                    {{-- Card Body --}}
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title fw-bold mb-0">{{ $purchase->asset->title }}</h5>
                            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1">
                                New
                            </span>
                        </div>

                        {{-- Purchase Details --}}
                        <div class="mt-3">
                            <div class="d-flex align-items-center text-secondary small mb-2">
                                <i class="bi bi-calendar3 me-2"></i>
                                Purchased: <span class="fw-semibold ms-1">{{ $purchase->purchased_at->format('d M Y, h:i A') }}</span>
                            </div>
                            
                            <div class="d-flex align-items-center text-secondary small mb-2">
                                <i class="bi bi-currency-rupee me-2"></i>
                                Amount: <span class="fw-bold text-primary ms-1">₹{{ number_format($purchase->price, 2) }}</span>
                            </div>
                            
                            <div class="d-flex align-items-center text-secondary small">
                                <i class="bi bi-upc-scan me-2"></i>
                                Transaction ID:
                                <span class="ms-1 fw-semibold text-muted transaction-id" style="font-size: 0.75rem;">
                                    {{ substr($purchase->transaction_id, 0, 12) }}...
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-top-0 p-4 pt-0">
                        <div class="d-grid gap-2">
                            <a href="{{ route('asset.download', $purchase->asset) }}" 
                               class="btn btn-primary rounded-pill py-2">
                                <i class="bi bi-download me-2"></i>
                                Download
                            </a>
                            <div class="d-flex gap-2">
                                <a href="{{ route('assets.show', $purchase->asset) }}" 
                                   class="btn btn-outline-secondary rounded-pill flex-grow-1">
                                    <i class="bi bi-info-circle me-2"></i>Details
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
                <div class="d-flex align-items-center">
                    <span class="text-secondary">
                        Showing <span class="fw-semibold">{{ $purchases->firstItem() ?? 0 }}</span>
                        to <span class="fw-semibold">{{ $purchases->lastItem() ?? 0 }}</span>
                        of <span class="fw-semibold">{{ $purchases->total() }}</span> purchases
                    </span>
                    
                    {{-- Items per page dropdown --}}
                    <select class="form-select form-select-sm w-auto ms-3 rounded-pill" onchange="changePerPage(this)">
                        <option value="12" {{ request('per_page') == 12 ? 'selected' : '' }}>12 per page</option>
                        <option value="24" {{ request('per_page') == 24 ? 'selected' : '' }}>24 per page</option>
                        <option value="48" {{ request('per_page') == 48 ? 'selected' : '' }}>48 per page</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-md-end">
                    {{ $purchases->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>

        {{-- Recent Activity Timeline --}}
        <div class="row mt-5">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white border-0 p-4">
                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-clock-history text-primary me-2"></i>
                            Recent Purchase Activity
                        </h5>
                    </div>
                    <div class="card-body p-4 pt-0">
                        <div class="timeline">
                            @foreach($purchases->take(5) as $purchase)
                            <div class="timeline-item d-flex gap-3 mb-4">
                                <div class="timeline-icon">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-2">
                                        <i class="bi bi-bag-check text-primary"></i>
                                    </div>
                                </div>
                                <div class="timeline-content flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="fw-bold mb-1">{{ $purchase->asset->title }}</h6>
                                        <small class="text-secondary">{{ $purchase->purchased_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="text-secondary small mb-0">
                                        Transaction: {{ substr($purchase->transaction_id, 0, 16) }}...
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- Enhanced Empty State --}}
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 text-center py-5">
                    <div class="card-body p-5">
                        <div class="mb-5 position-relative">
                            <div class="bg-light rounded-circle d-inline-block p-5">
                                <i class="bi bi-bag-x text-primary" style="font-size: 4rem;"></i>
                            </div>
                            <div class="position-absolute top-0 start-50 translate-middle">
                                <span class="badge bg-danger rounded-pill p-3">0</span>
                            </div>
                        </div>

                        <h3 class="fw-bold mb-3">No purchases yet</h3>
                        <p class="text-secondary mb-4">
                            You haven't purchased any assets yet. Explore our marketplace and 
                            find amazing digital assets for your next project.
                        </p>

                        <div class="d-flex justify-content-center gap-3">
                            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg px-5 rounded-pill">
                                <i class="bi bi-shop me-2"></i>Browse Marketplace
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Search functionality
    $('#searchPurchases').on('keyup', function() {
        var searchText = $(this).val().toLowerCase();
        $('.purchase-item').each(function() {
            var title = $(this).find('.card-title').text().toLowerCase();
            var transaction = $(this).find('.transaction-id').text().toLowerCase();
            if (title.includes(searchText) || transaction.includes(searchText)) {
                $(this).show(300);
            } else {
                $(this).hide(300);
            }
        });
    });

    // Filter buttons
    $('.btn-group .btn').on('click', function() {
        $(this).addClass('active').siblings().removeClass('active');
        // Add your filter logic here
        var filter = $(this).text().trim();
        
        // Show loading state
        $('#purchasesContainer').addClass('opacity-50');
        
        setTimeout(function() {
            $('#purchasesContainer').removeClass('opacity-50');
        }, 500);
    });

    // Lazy loading images
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.add('fade-in');
                observer.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
});

// Change items per page
function changePerPage(select) {
    var perPage = select.value;
    var url = new URL(window.location.href);
    url.searchParams.set('per_page', perPage);
    url.searchParams.set('page', 1); // Reset to first page
    window.location.href = url.toString();
}

// Download tracking
$('.btn-primary').on('click', function(e) {
    if ($(this).find('.bi-download').length) {
        // Track download
        gtag('event', 'download', {
            'event_category': 'purchases',
            'event_label': $(this).closest('.card').find('.card-title').text()
        });
    }
});
</script>
@endpush