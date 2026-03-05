<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in · AssetMarket</title>
    <!-- Bootstrap 5 (only CSS, no custom styles) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (optional but nice for visual) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light d-flex align-items-center min-vh-100">

    <!-- 
        LARAVEL LOGIN FORM – fully functional, Bootstrap only.
        All Laravel directives (csrf, session status, errors) are preserved.
        Classes are replaced with Bootstrap equivalents – no custom CSS.
    -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">

                @yield('content')

            </div>
        </div>
    </div>

    <!-- Bootstrap JS bundle (optional, for any interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>