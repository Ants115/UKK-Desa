{{-- resources/views/dashboard/admin.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    .page-dashboard-admin {
        max-width: 1100px;
        margin: 30px auto;
        padding: 0 15px 40px;
        font-family: Arial, sans-serif;
    }

    .admin-header {
        margin-bottom: 20px;
    }

    .admin-title {
        font-size: 28px;
        font-weight: 700;
        color: #1b3b2f;
        margin-bottom: 5px;
    }

    .admin-subtitle {
        font-size: 14px;
        color: #555;
    }

    .admin-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 15px;
    }

    .card-admin {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        padding: 20px 22px;
        flex: 1 1 340px;
    }

    .card-title {
        font-size: 18px;
        font-weight: 600;
        color: #1b3b2f;
        margin-bottom: 10px;
    }

    .card-desc {
        font-size: 13px;
        color: #666;
        margin-bottom: 15px;
    }

    .badge-role {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 600;
        background: #e3f2fd;
        color: #1565c0;
        margin-left: 4px;
    }

    .btn-main {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 9px 18px;
        border-radius: 999px;
        border: none;
        background: #1a7f5a;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        margin-right: 8px;
    }

    .btn-main:hover {
        background: #145c42;
        color: #fff;
    }

    .btn-secondary-ghost {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 16px;
        border-radius: 999px;
        border: 1px solid #cfd8dc;
        background: #fff;
        color: #455a64;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-secondary-ghost:hover {
        background: #eceff1;
        color: #37474f;
    }

    .info-row {
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        margin-bottom: 4px;
    }

    .info-label {
        color: #777;
    }

    .info-value {
        color: #333;
        font-weight: 500;
    }

    .services-row {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 10px;
    }

    .service-item {
        flex: 1 1 260px;
        padding: 10px 12px;
        border-radius: 10px;
        background: #f4f6f8;
        font-size: 13px;
    }

    .service-title {
        font-weight: 600;
        margin-bottom: 4px;
        color: #1b3b2f;
    }

    .service-desc {
        color: #555;
        margin-bottom: 6px;
    }

    .service-link {
        font-size: 12px;
        font-weight: 600;
        color: #1a7f5a;
        text-decoration: none;
    }

    .service-link:hover {
        text-decoration: underline;
    }

    .mt-2 { margin-top: 8px; }
    .mt-3 { margin-top: 12px; }
    .mt-4 { margin-top: 16px; }

    @media (max-width: 768px) {
        .page-dashboard-admin {
            margin-top: 20px;
        }
        .admin-grid {
            flex-direction: column;
        }
    }
</style>

<div class="page-dashboard-admin">
    {{-- HEADER --}}
    <div class="admin-header">
        <h1 class="admin-title">
            Selamat Datang di Dashboard Admin
        </h1>
        <p class="admin-subtitle">
            Halo, <strong>{{ Auth::user()->name }}</strong>
            <span class="badge-role">Admin Desa</span><br>
            Dari sini Anda dapat mengelola pengajuan surat, inventaris desa, dan memantau layanan lain.
        </p>
    </div>

    <div class="admin-grid">
        {{-- KARTU AKTIVITAS UTAMA --}}
        <div class="card-admin">
            <h2 class="card-title">Aktivitas Utama Admin</h2>
            <p class="card-desc">
                Akses cepat ke modul yang paling sering digunakan, supaya tidak perlu bolak-balik menu.
            </p>

            <div class="mt-2">
                <a href="{{ route('admin.surat') }}" class="btn-main">
                    Kelola Pengajuan Surat
                </a>

                <a href="{{ route('inventaris.index') }}" class="btn-secondary-ghost">
                    Kelola Inventaris Desa
                </a>
            </div>

            <p class="card-desc mt-3">
                Tip: sesuaikan status surat dan isi estimasi selesai dengan jelas agar warga tahu kapan harus datang ke kantor desa.
            </p>
        </div>

        {{-- KARTU PROFIL ADMIN --}}
        <div class="card-admin">
            <h2 class="card-title">Profil Singkat Admin</h2>
            <p class="card-desc">
                Data ini diambil dari akun yang digunakan untuk login ke sistem.
            </p>

            <div class="info-row">
                <span class="info-label">Nama:</span>
                <span class="info-value">{{ Auth::user()->name }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Email:</span>
                <span class="info-value">{{ Auth::user()->email }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Peran:</span>
                <span class="info-value">Admin Sistem Desa</span>
            </div>
            <div class="info-row">
                <span class="info-label">Masuk sebagai:</span>
                <span class="info-value">{{ now()->format('d-m-Y H:i') }}</span>
            </div>

            <div class="mt-4">
                <a href="{{ route('home') }}" class="btn-secondary-ghost">
                    Kembali ke Beranda
                </a>
            </div>

            <p class="text-muted mt-2" style="font-size:12px;">
                Jika ada perubahan data admin (email, nama, atau hak akses), koordinasikan dengan operator IT sekolah/penguji UKK.
            </p>
        </div>
    </div>

    {{-- RINGKASAN LAYANAN --}}
    <div class="card-admin mt-4">
        <h2 class="card-title">Ringkasan Layanan yang Dikelola</h2>
        <p class="card-desc">
            Modul-modul berikut adalah fitur utama yang berjalan di aplikasi APP DESA PINTAR untuk mendukung administrasi dan pelayanan masyarakat.
        </p>

        <div class="services-row">
            <div class="service-item">
                <div class="service-title">Layanan Surat-Menyurat</div>
                <div class="service-desc">
                    Menangani pengajuan surat domisili, SKTM, pengantar KTP, kelahiran, kematian, dan jenis surat lain yang diajukan warga.
                </div>
                <a href="{{ route('admin.surat') }}" class="service-link">
                    Buka daftar pengajuan &rarr;
                </a>
            </div>

            <div class="service-item">
                <div class="service-title">Inventaris & Aset Desa</div>
                <div class="service-desc">
                    Mencatat barang milik desa: peralatan, fasilitas umum, dan aset lain agar tercatat rapi dan mudah dipantau kondisinya.
                </div>
                <a href="{{ route('inventaris.index') }}" class="service-link">
                    Kelola inventaris desa &rarr;
                </a>
            </div>

            <div class="service-item">
                <div class="service-title">Informasi & Koordinasi</div>
                <div class="service-desc">
                    Gunakan menu Beranda untuk menyampaikan informasi umum kepada warga, seperti jadwal layanan, jam operasional, dan pengumuman penting.
                </div>
                <a href="{{ route('home') }}" class="service-link">
                    Lihat halaman beranda &rarr;
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
