<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AssetMarket — best design, Bootstrap only</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="#">
                <span class="text-warning">◆</span> AssetMarket
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-medium">
                    <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Categories</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Popular</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">New</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Support</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-1">

        @yield('content')

    </div>

    <footer class=" bg-dark text-white pt-5 pb-4 mt-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-5">
                    <h4 class="fw-bold text-warning">AssetMarket</h4>
                    <p class="text-secondary small">Premium digital assets for creators, developers & designers. Best
                        Bootstrap design — no custom CSS, only pure Bootstrap.</p>
                </div>
                <div class="col-md-3 offset-md-1">
                    <h6 class="fw-semibold">Explore</h6>
                    <ul class="list-unstyled small">
                        <li><a href="#" class="text-white-50 text-decoration-none">Graphics</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Templates</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">3D & AR</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Fonts</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6 class="fw-semibold">Company</h6>
                    <ul class="list-unstyled small">
                        <li><a href="#" class="text-white-50 text-decoration-none">About</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Licenses</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Contact</a></li>
                    </ul>
                </div>
            </div>
            <hr class="border-secondary">
            <div class="text-center small text-secondary">
                © 2026 AssetMarket – best Bootstrap design. All rights reserved.
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>