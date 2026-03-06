<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AssetMarket — best design, Bootstrap only</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Prose CSS for rich text styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/typography@0.5.x/dist/typography.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom prose styling for RichEditor content -->
    <style>
    .prose {
        max-width: 100%;
    }

    .prose h1,
    .prose h2,
    .prose h3,
    .prose h4,
    .prose h5,
    .prose h6 {
        font-weight: 600;
        margin-top: 1.5em;
        margin-bottom: 0.5em;
        color: #212529;
    }

    .prose h1 {
        font-size: 2em;
    }

    .prose h2 {
        font-size: 1.5em;
    }

    .prose h3 {
        font-size: 1.25em;
    }

    .prose p {
        margin-bottom: 1em;
        line-height: 1.75;
    }

    .prose a {
        color: #0d6efd;
        text-decoration: none;
    }

    .prose a:hover {
        text-decoration: underline;
    }

    .prose ul,
    .prose ol {
        margin-left: 1.5em;
        margin-bottom: 1em;
    }

    .prose li {
        margin-bottom: 0.5em;
    }

    .prose blockquote {
        border-left: 4px solid #dee2e6;
        padding-left: 1em;
        margin-left: 0;
        margin-bottom: 1em;
        color: #6c757d;
        font-style: italic;
    }

    .prose code {
        background-color: #f8f9fa;
        padding: 0.2em 0.4em;
        border-radius: 0.25em;
        font-family: 'Courier New', monospace;
        color: #d63384;
    }

    .prose pre {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 0.5em;
        padding: 1em;
        overflow-x: auto;
        margin-bottom: 1em;
    }

    .prose pre code {
        background-color: transparent;
        color: #212529;
        padding: 0;
    }

    .prose img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5em;
        margin: 1em 0;
    }

    .prose table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1em;
    }

    .prose table th {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        padding: 0.75em;
        text-align: left;
        font-weight: 600;
    }

    .prose table td {
        border: 1px solid #dee2e6;
        padding: 0.75em;
    }
    </style>
</head>

<body class="bg-light">

    @include('partials.app.header')

    <div class="container my-1">
        @yield('content')
    </div>

    @include('partials.app.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>