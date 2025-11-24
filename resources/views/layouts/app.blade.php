{{-- resources/views/beranda.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Sistem Informasi Desa</title>
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
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                text-align: center;
            }
            .hero-text {
                max-width: 100%;
            }
            .hero img {
                margin-top: 30px;
            }
        }
    </style>
</head>
<body>

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/logo-sidoarjo.png') }}" alt="Logo Sidoarjo" style="height: 50px; margin-right: 10px;">
            <h2 class="mb-0 fs-4">APP DESA PINTAR</h2>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Beranda</a></li>

               {{-- Dropdown Layanan Publik --}}
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Layanan Publik</a>
    <ul class="dropdown-menu">

        @auth
            {{-- User sudah login --}}
            <li>
                <a class="dropdown-item" 
                   href="{{ auth()->user()->role == 'warga' ? route('layanan.surat') : route('admin.surat') }}">
                   Pelayanan Surat-Menyurat Digital
                </a>
            </li>
        @else
            {{-- Pengunjung belum login --}}
            <li>
                <a class="dropdown-item" href="{{ route('login') }}">
                    Pelayanan Surat-Menyurat Digital
                </a>
            </li>
        @endauth

      <li>
    <a class="dropdown-item" href="{{ route('layanan.inventaris') }}">
        Manajemen Inventaris Aset Desa
    </a>
</li>

        <li><a class="dropdown-item" href="#">Layanan Pengaduan Masyarakat</a></li>
        <li><a class="dropdown-item" href="#">Manajemen Kegiatan & Program Desa</a></li>
    </ul>
</li>


                @auth
                <li class="nav-item">
        <a  class="nav-link" href="{{ auth()->user()->role == 'admin' ? route('admin.dashboard') : route('dashboard') }}" style="color: white; margin-right: 15px; text-decoration: none;">Dashboard</a>
    </li>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" style="background-color: #d31414; color: white; border: none; padding: 8px 15px; border-radius: 30px; font-weight: 600;">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}" 
           style="background-color: #1a91e0ff; color: white; padding: 8px 15px; border-radius: 30px; text-decoration: none; font-weight: 600; margin-right: 10px;">
           Login
        </a>
        <a href="{{ route('register') }}" 
           style="background-color: #1a91e0ff; color: white; padding: 8px 15px; border-radius: 30px; text-decoration: none; font-weight: 600;">
           Register
        </a>
    @endauth
            </ul>
        </div>
    </div>
</nav>

        @yield('content')
        
    {{-- Footer --}}
<footer>
    <p>&copy; {{ date('Y') }} Sistem Informasi Desa Bangah. Semua Hak Dilindungi.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>