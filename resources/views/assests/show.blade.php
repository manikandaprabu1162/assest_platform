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

                    <button class="btn btn-warning btn-lg w-100 fw-semibold mb-3">
                        Buy Now
                    </button>

                    <button class="btn btn-outline-dark w-100 mb-3">
                        Add to Wishlist
                    </button>

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

@endsection