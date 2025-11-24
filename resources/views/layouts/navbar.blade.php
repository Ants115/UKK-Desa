<nav class="navbar navbar-expand-lg" style="background-color: #195c26;">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand d-flex align-items-center text-white" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-sidoarjo.png') }}" width="45" class="me-2">
            <strong>APP DESA PINTAR</strong>
        </a>

        <!-- BUTTON TOGGLE MOBILE -->
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <!-- BERANDA -->
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}">Beranda</a>
                </li>

                <!-- LAYANAN PUBLIK DROPDOWN -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                       data-bs-toggle="dropdown">
                        Layanan Publik
                    </a>
                    <ul class="dropdown-menu" style="background:#1f722f;">

                        <li>
                            <a class="dropdown-item text-white" href="{{ route('layanan.surat') }}">
                                Pelayanan Surat-Menyurat Digital
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item text-white" href="#">
                                Manajemen Inventaris Aset Desa
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item text-white" href="#">
                                Layanan Pengaduan Masyarakat
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item text-white" href="#">
                                Manajemen Kegiatan & Program Desa
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- LOGIN / REGISTER -->
                @guest
                    <li class="nav-item ms-2">
                        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                    </li>

                    <li class="nav-item ms-2">
                        <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest

                <!-- USER LOGGED IN -->
                @auth
                    <li class="nav-item ms-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth

            </ul>
        </div>

    </div>
</nav>