@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb bg-white p-3 rounded-3 shadow-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a>
        </li>
        <li class="breadcrumb-item active">{{ $asset->title }}</li>
    </ol>
</nav>

<div class="row g-4">

    {{-- LEFT CONTENT --}}
    <div class="col-lg-8">

        {{-- PREVIEW SECTION --}}
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">

            @if($asset->attachments && $asset->attachments->count() > 0)

            <div id="assetCarousel" class="carousel slide">

                <div class="carousel-inner">

                    @foreach($asset->attachments as $index => $attachment)

                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">

                        <img src="{{ route('attachments.image', $attachment) }}" class="w-100"
                            style="height:420px; object-fit:cover;" alt="{{ $asset->title }}">

                    </div>

                    @endforeach

                </div>

                @if($asset->attachments->count() > 1)

                <button class="carousel-control-prev" type="button" data-bs-target="#assetCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#assetCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>

                @endif

            </div>

            @else

            <img src="{{ route('assets.thumbnail', $asset) }}" class="w-100" style="height:420px; object-fit:cover;">

            @endif

        </div>


        {{-- TITLE + DESCRIPTION --}}
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-4">

                <h1 class="fw-bold mb-3">{{ $asset->title }}</h1>

                @if($asset->description)
                <div class="prose prose-lg text-secondary mb-4" style="line-height: 1.8;">
                    {!! $asset->description !!}
                </div>
                @endif

            </div>
        </div>


        {{-- TECH STACK --}}
        @if($asset->tech_json && count($asset->tech_json))

        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-4">

                <h5 class="fw-bold mb-3">
                    ⚙ Technical Stack
                </h5>

                <div class="d-flex flex-wrap gap-2">

                    @foreach($asset->tech_json as $tech)

                    <span class="badge bg-dark px-3 py-2">
                        {{ $tech }}
                    </span>

                    @endforeach

                </div>

            </div>
        </div>

        @endif


        {{-- ITEM DETAILS --}}
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">

                <h5 class="fw-bold mb-4">📋 Item Details</h5>

                <table class="table">

                    <tr>
                        <th width="40%">Category</th>
                        <td>{{ $asset->category->name ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Compatible Browsers</th>
                        <td>Chrome, Firefox, Safari, Edge</td>
                    </tr>

                    <tr>
                        <th>Created</th>
                        <td>{{ $asset->created_at->format('F Y') }}</td>
                    </tr>

                    <tr>
                        <th>Last Update</th>
                        <td>{{ $asset->updated_at->format('F Y') }}</td>
                    </tr>

                    <tr>
                        <th>Author</th>
                        <td class="fw-semibold">Manikandaprabu</td>
                    </tr>

                </table>

            </div>
        </div>

    </div>


    {{-- RIGHT SIDEBAR --}}
    <div class="col-lg-4">

        <div class="position-sticky" style="top:100px;">

            <div class="card border-0 shadow-lg rounded-4 mb-4">

                <div class="card-body p-4">

                    <span class="badge bg-success mb-3">
                        Instant Download
                    </span>

                    <div class="display-5 fw-bold mb-3">
                        ${{ $asset->price }}
                    </div>

                    {{-- ONLY THIS BUTTON IS CHANGED --}}
                    @auth
                    @php
                    $purchase = App\Models\Purchase::where('user_id', Auth::id())
                    ->where('asset_id', $asset->id)
                    ->where('payment_status', 'completed')
                    ->first();
                    @endphp

                    @if($purchase)
                    <a href="{{ route('asset.download', $asset) }}"
                        class="btn btn-success btn-lg w-100 fw-semibold mb-3">
                        Download Now
                    </a>
                    @else
                    <button id="buy-now-btn" class="btn btn-primary btn-lg w-100 fw-semibold mb-3">Buy Now</button>
                    <div id="paymentError" class="text-danger mt-2" style="display:none;"></div>
                    @endif
                    @else
                    <a href="{{ route('login') }}" class="btn btn-warning btn-lg w-100 fw-semibold mb-3">
                        Login to Purchase
                    </a>
                    @endauth

                    @auth
                    <button id="wishlist-btn" class="btn btn-outline-dark w-100 mb-3" data-asset-id="{{ $asset->id }}">
                        <span id="wishlist-text">Add to Wishlist</span>
                    </button>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-outline-dark w-100 mb-3">
                        Login to Add Wishlist
                    </a>
                    @endauth

                    <hr>

                    <div class="small text-secondary">

                        <div class="mb-2">✔ Secure Payment</div>
                        <div class="mb-2">✔ Lifetime Access</div>
                        <div class="mb-2">✔ Free Updates</div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- Add this modal at the bottom --}}
<div class="modal fade" id="paymentLoadingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <div class="spinner-border text-warning mb-3" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <h5>Processing Payment...</h5>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
$(document).ready(function() {
    $('#buy-now-btn').on('click', function(e) {
        e.preventDefault();
        
        var $paymentError = $('#paymentError');
        var loadingModal = new bootstrap.Modal(document.getElementById('paymentLoadingModal'));
        loadingModal.show();
        
        $.ajax({
            url: '{{ route("purchase.createOrder", $asset) }}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(data) {
                loadingModal.hide();
                
                if (!data.success) {
                    $paymentError.text(data.message).show();
                    return;
                }
                
                var options = {
                    key: data.key,
                    amount: data.amount,
                    currency: 'INR',
                    name: '{{ config("app.name") }}',
                    description: '{{ $asset->title }}',
                    order_id: data.order_id,
                    handler: function(response) {
                        $.ajax({
                            url: '{{ route("purchase.verifyPayment") }}',
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            contentType: 'application/json',
                            data: JSON.stringify({
                                razorpay_payment_id: response.razorpay_payment_id,
                                razorpay_order_id: response.razorpay_order_id,
                                razorpay_signature: response.razorpay_signature,
                                asset_id: {{ $asset->id }}
                            }),
                            dataType: 'json',
                            success: function(result) {
                                if (result.success) {
                                    window.location.href = result.redirect;
                                } else {
                                    $paymentError.text(result.message).show();
                                }
                            },
                            error: function() {
                                $paymentError.text('Payment verification failed. Please try again.').show();
                            }
                        });
                    },
                    prefill: {
                        name: '{{ Auth::user()->name }}',
                        email: '{{ Auth::user()->email }}'
                    },
                    theme: {
                        color: '#007bff'
                    }
                };
                
                var rzp = new Razorpay(options);
                rzp.open();
            },
            error: function() {
                loadingModal.hide();
                $paymentError.text('Failed to create payment order. Please try again.').show();
            }
        });
    });

    // Wishlist functionality
    @auth
    $('#wishlist-btn').on('click', function(e) {
        e.preventDefault();
        var $btn = $(this);
        var assetId = $btn.data('asset-id');
        var $text = $('#wishlist-text');
        var isInWishlist = $btn.hasClass('in-wishlist');

        if (isInWishlist) {
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
                        $btn.removeClass('in-wishlist btn-dark').addClass('btn-outline-dark');
                        $text.text('Add to Wishlist');
                    } else {
                        alert(data.message);
                    }
                },
                error: function() {
                    alert('Failed to remove from wishlist. Please try again.');
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
                        $btn.addClass('in-wishlist btn-dark').removeClass('btn-outline-dark');
                        $text.text('Added to Wishlist');
                    } else {
                        alert(data.message);
                    }
                },
                error: function() {
                    alert('Failed to add to wishlist. Please try again.');
                }
            });
        }
    });

    // Check if asset is already in wishlist on page load
    @php
        $assetId = $asset->id;
        $inWishlist = Auth::check() && \App\Models\Wishlist::where('user_id', Auth::id())
            ->where('asset_id', $assetId)
            ->exists();
    @endphp
    
    @if($inWishlist)
        $('#wishlist-btn').addClass('in-wishlist btn-dark').removeClass('btn-outline-dark');
        $('#wishlist-text').text('Added to Wishlist');
    @endif
    @endauth
});
</script>
@endpush