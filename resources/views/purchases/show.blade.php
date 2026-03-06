@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Complete Your Purchase</h4>
                </div>

                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <!-- Asset Details -->
                    <div class="asset-details mb-4 p-3 border rounded">
                        <div class="row">
                            <div class="col-md-4">
                                @if($asset->preview_image)
                                <img src="{{ asset('storage/' . $asset->preview_image) }}" class="img-fluid rounded"
                                    alt="{{ $asset->name }}">
                                @else
                                <div class="bg-light p-5 text-center rounded">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h3>{{ $asset->name }}</h3>
                                <p class="text-muted">{{ $asset->description }}</p>
                                <h2 class="text-primary">₹{{ number_format($asset->price, 2) }}</h2>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Section -->
                    <div class="payment-section text-center">
                        <button id="pay-button" class="btn btn-success btn-lg">
                            <i class="fas fa-lock"></i> Pay ₹{{ number_format($asset->price, 2) }}
                        </button>

                        <div id="loading" style="display: none;" class="mt-3">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-2">Processing payment...</p>
                        </div>

                        <div class="mt-3">
                            <small class="text-muted">
                                <i class="fas fa-shield-alt"></i>
                                Secure payment powered by Razorpay
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
document.getElementById('pay-button').addEventListener('click', function(e) {
    e.preventDefault();

    // Show loading
    document.getElementById('pay-button').style.display = 'none';
    document.getElementById('loading').style.display = 'block';

    // Create order
    fetch('{{ route("asset.create-order", $asset) }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                var options = {
                    key: data.key,
                    amount: data.amount,
                    currency: 'INR',
                    name: '{{ config("app.name") }}',
                    description: 'Purchase: {{ $asset->name }}',
                    image: '{{ asset("images/logo.png") }}',
                    order_id: data.order_id,
                    handler: function(response) {
                        verifyPayment(response);
                    },
                    prefill: {
                        name: '{{ auth()->user()->name }}',
                        email: '{{ auth()->user()->email }}',
                        contact: '{{ auth()->user()->phone ?? "" }}'
                    },
                    theme: {
                        color: '#3399cc'
                    },
                    modal: {
                        ondismiss: function() {
                            // Payment modal closed without completing
                            document.getElementById('pay-button').style.display = 'block';
                            document.getElementById('loading').style.display = 'none';
                            alert('Payment cancelled');
                        }
                    }
                };

                var rzp = new Razorpay(options);
                rzp.open();
            } else {
                alert(data.message || 'Failed to create order');
                document.getElementById('pay-button').style.display = 'block';
                document.getElementById('loading').style.display = 'none';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Something went wrong. Please try again.');
            document.getElementById('pay-button').style.display = 'block';
            document.getElementById('loading').style.display = 'none';
        });
});

function verifyPayment(response) {
    fetch('{{ route("payment.verify") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                razorpay_payment_id: response.razorpay_payment_id,
                razorpay_order_id: response.razorpay_order_id,
                razorpay_signature: response.razorpay_signature,
                asset_id: '{{ $asset->id }}'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = data.redirect;
            } else {
                alert(data.message || 'Payment verification failed');
                document.getElementById('pay-button').style.display = 'block';
                document.getElementById('loading').style.display = 'none';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Payment verification failed');
            document.getElementById('pay-button').style.display = 'block';
            document.getElementById('loading').style.display = 'none';
        });
}
</script>
@endpush
@endsection