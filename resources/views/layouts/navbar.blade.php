<nav class="navbar navbar-expand-lg navbar-dark navbar-main">
    <div class="container-fluid">

        {{-- LOGO & BRAND --}}
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-sidoarjo.png') }}" alt="Logo Sidoarjo" style="height: 45px; margin-right: 10px;">
            <span class="fw-bold">APP DESA PINTAR</span>
        </a>

        {{-- TOGGLER MOBILE --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- MENU --}}
        <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
            <ul class="navbar-nav align-items-lg-center">

                {{-- BERANDA --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                </li>

                {{-- LAYANAN PUBLIK --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Layanan Publik
                    </a>
                    <ul class="dropdown-menu">

                        {{-- Pelayanan Surat-Menyurat Digital --}}
                        @auth
                            <li>
                                <a class="dropdown-item"
                                   href="{{ auth()->user()->role === 'warga' ? route('layanan.surat') : route('admin.surat') }}">
                                    Pelayanan Surat-Menyurat Digital
                                </a>
                            </li>
                        @else
                            <li>
                                <a class="dropdown-item" href="{{ route('login') }}">
                                    Pelayanan Surat-Menyurat Digital
                                </a>
                            </li>
                        @endauth

                        {{-- Inventaris Aset Desa --}}
                        @auth
                            <li>
                                <a class="dropdown-item" href="{{ route('layanan.inventaris') }}">
                                    Manajemen Inventaris Aset Desa
                                </a>
                            </li>
                        @else
                            <li>
                                <a class="dropdown-item" href="{{ route('login') }}">
                                    Manajemen Inventaris Aset Desa
                                </a>
                            </li>
                        @endauth

                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <a class="dropdown-item" href="#">
                                Layanan Pengaduan Masyarakat
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                Manajemen Kegiatan &amp; Program Desa
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- DASHBOARD / LOGIN / LOGOUT --}}
                @auth
                    {{-- Link Dashboard sesuai role --}}
                    <li class="nav-item ms-lg-2">
                        <a class="nav-link" href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    {{-- Tombol Logout --}}
                    <li class="nav-item ms-lg-2">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    {{-- Saat belum login --}}
                    <li class="nav-item ms-lg-3">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm rounded-pill px-3 me-2">
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-success btn-sm rounded-pill px-3">
                            Register
                        </a>
                    </li>
                @endauth

            </ul>
        </div>

    </div>
</nav>
