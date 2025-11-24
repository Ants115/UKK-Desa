<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Sistem Informasi Desa')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8f5e9;
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background-color: #1b5e20 !important;
        }
        .navbar-brand, .nav-link, .dropdown-toggle {
            color: #fff !important;
            font-weight: 500;
        }
        .dropdown-menu {
            background-color: #2e7d32;
            border: none;
        }
        .dropdown-item {
            color: #fff;
        }
        .dropdown-item:hover {
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
        footer {
            text-align: center;
            background-color: #2e7d32;
            color: white;
            padding: 15px;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
    </style>
</head>
<body>

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('images/logo-sidoarjo.png') }}" alt="Logo Sidoarjo" style="height: 50px; margin-right: 10px;">
            <h2 class="mb-0 fs-4">APP DESA PINTAR - ADMIN</h2>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a></li>
                <li class="nav-item"><a href="{{ route('inventaris.index') }}" class="nav-link">Inventaris</a></li>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm ms-2">Logout</button>
                </form>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<footer>
    <p>&copy; {{ date('Y') }} Sistem Informasi Desa Bangah. Semua Hak Dilindungi.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>