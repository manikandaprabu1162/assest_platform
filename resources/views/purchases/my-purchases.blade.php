@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">My Purchases</h2>

            @if($purchases->count() > 0)
            <div class="row">
                @foreach($purchases as $purchase)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($purchase->asset->preview_image)
                        <img src="{{ asset('storage/' . $purchase->asset->preview_image) }}" class="card-img-top"
                            alt="{{ $purchase->asset->name }}" style="height: 200px; object-fit: cover;">
                        @else
                        <div class="bg-light p-5 text-center">
                            <i class="fas fa-image fa-3x text-muted"></i>
                        </div>
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $purchase->asset->name }}</h5>
                            <p class="card-text">
                                <small class="text-muted">
                                    Purchased: {{ $purchase->purchased_at->format('d M Y') }}
                                </small><br>
                                <strong>Amount:</strong> ₹{{ number_format($purchase->price, 2) }}<br>
                                <strong>Transaction ID:</strong><br>
                                <small class="text-muted">{{ $purchase->transaction_id }}</small>
                            </p>
                        </div>

                        <div class="card-footer bg-white border-top-0">
                            <a href="{{ route('asset.download', $purchase->asset) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-download"></i> Download
                            </a>
                            <a href="{{ route('assets.show', $purchase->asset) }}"
                                class="btn btn-outline-secondary btn-sm">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $purchases->links() }}
            </div>
            @else
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i>
                You haven't purchased any assets yet.
                <a href="{{ route('assets.index') }}" class="alert-link">Browse assets</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection