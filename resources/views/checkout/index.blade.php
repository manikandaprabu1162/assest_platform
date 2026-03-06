@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title mb-4">Checkout</h2>

                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error:</strong>
                        @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <!-- Asset Details -->
                    <div class="mb-4 p-3 bg-light rounded">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="mb-1">{{ $asset->title }}</h5>
                                <p class="text-muted mb-0">by {{ $asset->user->name }}</p>
                            </div>
                            <div class="text-end">
                                <div class="fs-4 fw-bold text-primary">${{ number_format($asset->price, 2) }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Form -->
                    <form id="payment-form" action="{{ route('process-payment', $asset) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="card-element" class="form-label">Card Details</label>
                            <div id="card-element" class="form-control" style="height: 40px;"></div>
                            @error('stripeToken')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                            @enderror
                            <div id="card-errors" class="text-danger small mt-2"></div>
                        </div>

                        <div class="mb-3">
                            <label for="cardholder-name" class="form-label">Cardholder Name</label>
                            <input type="text" id="cardholder-name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" value="{{ auth()->user()->email }}"
                                readonly>
                        </div>

                        <input type="hidden" id="stripeToken" name="stripeToken">

                        <div class="d-grid gap-2">
                            <button type="submit" id="submit-button" class="btn btn-primary btn-lg" disabled>
                                <span id="button-text">Pay ${{ number_format($asset->price, 2) }}</span>
                                <span id="spinner" class="spinner-border spinner-border-sm ms-2 d-none" role="status"
                                    aria-hidden="true"></span>
                            </button>
                        </div>
                    </form>

                    <div class="alert alert-info mt-4 small">
                        <strong>Test Card Numbers:</strong>
                        <ul class="mb-0 mt-2">
                            <li><code>4242 4242 4242 4242</code> - Success</li>
                            <li><code>4000 0000 0000 0002</code> - Decline</li>
                            <li>Use any future expiry date and any 3-digit CVC</li>
                        </ul>
                    </div>

                    <a href="{{ route('assets.show', $asset) }}"
                        class="btn btn-outline-secondary btn-sm mt-3">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
const stripe = Stripe('{{ config("services.stripe.public") }}');
const elements = stripe.elements();
const cardElement = elements.create('card');
cardElement.mount('#card-element');

const form = document.getElementById('payment-form');
const submitButton = document.getElementById('submit-button');
const cardErrors = document.getElementById('card-errors');
const spinner = document.getElementById('spinner');
const buttonText = document.getElementById('button-text');
const stripeTokenInput = document.getElementById('stripeToken');

// Handle real-time validation errors from the card element
cardElement.addEventListener('change', (event) => {
    if (event.error) {
        cardErrors.textContent = event.error.message;
        submitButton.disabled = true;
    } else {
        cardErrors.textContent = '';
        submitButton.disabled = false;
    }
});

// Handle form submission
form.addEventListener('submit', async (event) => {
    event.preventDefault();
    submitButton.disabled = true;
    spinner.classList.remove('d-none');
    buttonText.textContent = 'Processing...';

    const cardholderName = document.getElementById('cardholder-name').value;

    // Create payment token
    const {
        token,
        error
    } = await stripe.createToken(cardElement, {
        name: cardholderName,
    });

    if (error) {
        cardErrors.textContent = error.message;
        submitButton.disabled = false;
        spinner.classList.add('d-none');
        buttonText.textContent = 'Pay ${{ number_format($asset->price, 2) }}';
    } else {
        // Token created successfully
        stripeTokenInput.value = token.id;
        form.submit();
    }
});
</script>
@endpush