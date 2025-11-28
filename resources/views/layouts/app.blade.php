<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Sistem Informasi Desa')</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #e8f5e9;
            font-family: 'Poppins', sans-serif;
        }

        .app-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .app-content {
            flex: 1 0 auto;
        }

        .app-footer {
            flex-shrink: 0;
            text-align: center;
            background-color: #2e7d32;
            color: #ffffff;
            padding: 12px 10px;
            font-size: 14px;
        }

        /* Navbar base style (dipakai oleh layouts.navbar) */
        .navbar-main {
            background-color: #1b5e20 !important;
        }

        .navbar-main .navbar-brand,
        .navbar-main .nav-link,
        .navbar-main .dropdown-toggle {
            color: #fff !important;
            font-weight: 500;
        }

        .navbar-main .dropdown-menu {
            background-color: #2e7d32;
            border: none;
        }

        .navbar-main .dropdown-item {
            color: #fff;
            font-size: 14px;
        }

        .navbar-main .dropdown-item:hover {
            background-color: #43a047;
            color: #fff;
        }

        .btn-green {
            background-color: #43a047;
            color: white;
            border-radius: 30px;
            padding: 10px 25px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-green:hover {
            background-color: #2e7d32;
            color: #fff;
        }

        /* Hero section (dipakai kalau beranda butuh) */
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 100px 10%;
        }
        .hero-text {
            max-width: 50%;
        }
        .hero-text h1 {
            font-size: 48px;
            font-weight: 700;
            color: #2e7d32;
        }
        .hero-text p {
            font-size: 18px;
            color: #555;
            margin: 20px 0;
        }
        .hero img {
            width: 420px;
            height: auto;
        }
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                text-align: center;
                padding: 60px 20px;
            }
            .hero-text {
                max-width: 100%;
            }
            .hero img {
                margin-top: 30px;
            }
        }

        /* Utility umum (card dan tombol utama) */
        .card-custom {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
            border: none;
        }

        .btn-primary-rounded {
            background: #1a7f5a;
            border: none;
            color: #fff;
            padding: 9px 18px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .btn-primary-rounded:hover {
            background: #145c42;
            color: #fff;
        }
    </style>

    @stack('styles')
</head>
<body>
<div class="app-wrapper">

    {{-- Navbar global --}}
    @include('layouts.navbar')

    {{-- Konten halaman --}}
    <main class="app-content">
        @yield('content')
    </main>

    {{-- Footer global (tidak lagi fixed, tidak menutupi konten) --}}
    <footer class="app-footer">
        <p class="mb-0">&copy; {{ date('Y') }} Sistem Informasi Desa Bangah. Semua Hak Dilindungi.</p>
    </footer>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>
