<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'UPJfund')</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- Favicon (optional) --}}
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- Custom Style --}}
    <style>
        body { 
            font-family: 'DM Sans', sans-serif; 
            background-color: #F1FAEF; 
        }

        .bg-soft-green { 
            background-color: #F1FAEF; 
        }

        .btn-green { 
            background-color: #74C69D; 
            color: #fff; 
        }

        .btn-green:hover { 
            background-color: #5faf87; 
            color: #fff; 
        }

        .text-green {
            color: #74C69D !important;
        }

        .hero-section {
            background: url('/images/hero.jpeg') no-repeat center center;
            background-size: cover;
            min-height: 100vh;
            position: relative;
        }

        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .z-1 {
            z-index: 1;
        }
    </style>

    @stack('styles')
</head>
<body>
    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    {{-- Bootstrap Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
