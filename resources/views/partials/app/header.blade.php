<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3" href="{{ route('dashboard') }}">
            <span class="text-warning">◆</span> AssetMarket
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-medium">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link px-3 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-house-door me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('purchases.my') }}" class="nav-link px-3 {{ request()->routeIs('purchases.my') ? 'active' : '' }}">
                        <i class="bi bi-bag-check me-1"></i> My Purchases
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('wishlist.index') }}" class="nav-link px-3 {{ request()->routeIs('wishlist.index') ? 'active' : '' }}">
                        <i class="bi bi-heart me-1"></i> Wishlist
                        @auth
                            @php
                                $wishlistCount = App\Models\Wishlist::where('user_id', Auth::id())->count();
                            @endphp
                            @if($wishlistCount > 0)
                                <span class="badge bg-danger rounded-pill ms-1">{{ $wishlistCount }}</span>
                            @endif
                        @endauth
                    </a>
                </li>
            </ul>
            @auth
            <div class="d-flex gap-2">
                <div class="dropdown">
                    <button class="btn btn-outline-light dropdown-toggle d-flex align-items-center gap-2" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                             style="width: 28px; height: 28px; font-size: 14px;">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="bi bi-person me-2"></i>Profile
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            @else
            <div class="d-flex gap-2">
                <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
                <a href="{{ route('register') }}" class="btn btn-warning">Register</a>
            </div>
            @endauth
        </div>
    </div>
</nav>

@push('styles')
<style>
/* Keep your existing dark theme */
.navbar-dark .navbar-nav .nav-link {
    color: rgba(255, 255, 255, 0.85);
    transition: all 0.2s ease;
    border-radius: 6px;
}

.navbar-dark .navbar-nav .nav-link:hover {
    color: #fff;
    background: rgba(255, 255, 255, 0.1);
}

.navbar-dark .navbar-nav .nav-link.active {
    color: #ffc107;
    background: rgba(255, 193, 7, 0.1);
}

/* User avatar in button */
.btn-outline-light {
    border-color: rgba(255, 255, 255, 0.2);
}

.btn-outline-light:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.3);
}

/* Dropdown styling */
.dropdown-menu {
    margin-top: 10px;
    border: none;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    border-radius: 8px;
    min-width: 200px;
}

.dropdown-item {
    padding: 8px 20px;
    transition: all 0.2s ease;
}

.dropdown-item:hover {
    background: #f8f9fa;
    padding-left: 25px;
}

.dropdown-item i {
    width: 20px;
    color: #6c757d;
}

/* Badge styling */
.badge.bg-danger {
    background: #dc3545 !important;
    font-size: 11px;
    padding: 3px 6px;
}

/* Sticky header */
.sticky-top {
    top: 0;
    z-index: 1030;
}

/* Mobile adjustments */
@media (max-width: 991.98px) {
    .navbar-nav .nav-link {
        padding: 10px 15px !important;
        margin: 2px 0;
    }
    
    .navbar-collapse {
        background: #212529;
        padding: 15px;
        border-radius: 8px;
        margin-top: 10px;
    }
}
</style>
@endpush