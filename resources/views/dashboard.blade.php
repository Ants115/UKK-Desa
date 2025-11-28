{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    .page-dashboard {
        max-width: 1100px;
        margin: 30px auto;
        padding: 0 15px;
        font-family: Arial, sans-serif;
    }

    .dash-header {
        margin-bottom: 25px;
        text-align: left;
    }

    .dash-title {
        font-size: 28px;
        font-weight: 700;
        color: #1b3b2f;
        margin-bottom: 5px;
    }

    .dash-subtitle {
        font-size: 14px;
        color: #555;
    }

    .dash-grid {
        display: grid;
        grid-template-columns: 2fr 1.2fr;
        gap: 20px;
        margin-bottom: 20px;
    }

    .card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        padding: 20px 22px;
    }

    .card-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 12px;
        color: #1b3b2f;
    }

    .quick-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 5px;
    }

    .btn-dash {
        display: inline-block;
        border-radius: 999px;
        padding: 8px 16px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        border: 1px solid transparent;
        cursor: pointer;
        transition: all 0.15s ease;
        white-space: nowrap;
    }

    .btn-dash-primary {
        background: #1a7f5a;
        color: #fff;
        border-color: #1a7f5a;
    }

    .btn-dash-primary:hover {
        background: #145c42;
        border-color: #145c42;
    }

    .btn-dash-outline {
        background: #f4f6f8;
        color: #1b3b2f;
        border-color: #d0d4da;
    }

    .btn-dash-outline:hover {
        background: #e3e7ec;
    }

    .user-info-list {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
        font-size: 13px;
        color: #333;
    }

    .user-info-list li {
        margin-bottom: 6px;
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

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
        gap: 15px;
        margin-top: 10px;
    }

    .service-item {
        border-radius: 10px;
        border: 1px solid #e2e5e9;
        padding: 14px 14px 12px;
        background: #f9fbf7;
    }

    .service-title {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 4px;
        color: #1b3b2f;
    }

    .service-desc {
        font-size: 12px;
        color: #666;
        margin-bottom: 8px;
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

    .hint-text {
        font-size: 12px;
        color: #777;
        margin-top: 8px;
    }

    @media (max-width: 830px) {
        .dash-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

@php
    $u = $user ?? Auth::user();
@endphp

<div class="page-dashboard">
    {{-- HEADER --}}
    <div class="dash-header">
        <h1 class="dash-title">Selamat Datang di Dashboard</h1>
        <p class="dash-subtitle">
            Halo, <strong>{{ $u->name ?? 'Warga' }}</strong>
            <span class="badge-role">Warga Desa</span>
            <br>
            Dari sini kamu bisa mengajukan surat, melihat inventaris desa, dan mengakses layanan lain.
        </p>
    </div>

    {{-- GRID UTAMA --}}
    <div class="dash-grid">
        {{-- KARTU AKTIVITAS CEPAT --}}
        <div class="card">
            <h2 class="card-title">Aktivitas Cepat</h2>
            <p style="font-size:13px; color:#555; margin-bottom:10px;">
                Beberapa tindakan yang paling sering digunakan disatukan di sini agar kamu tidak perlu bolak-balik menu.
            </p>

            <div class="quick-actions">
                <a href="{{ route('surat.index') }}" class="btn-dash btn-dash-primary">
                    ✉️ Ajukan Surat Desa
                </a>

                <a href="{{ route('surat.index') }}#riwayat" class="btn-dash btn-dash-outline">
                    📄 Lihat Riwayat Surat
                </a>

                <a href="{{ route('inventaris.public') }}" class="btn-dash btn-dash-outline">
                    🏛️ Lihat Inventaris Desa
                </a>
            </div>

            <div class="hint-text">
                Tip: gunakan <strong>Pengajuan Online Lengkap</strong> di menu Surat agar proses di kantor desa lebih cepat.
            </div>
        </div>

        {{-- KARTU INFO AKUN --}}
        <div class="card">
            <h2 class="card-title">Profil Singkat Akun</h2>
            <ul class="user-info-list">
                <li><strong>Nama:</strong> {{ $u->name ?? '-' }}</li>
                <li><strong>Email:</strong> {{ $u->email ?? '-' }}</li>
                <li>
                    <strong>Bergabung sejak:</strong>
                    {{ $u->created_at?->format('d-m-Y') ?? '-' }}
                </li>
            </ul>

            <p class="hint-text">
                Pastikan data akunmu selalu aktif. Jika ada perubahan identitas, sampaikan ke perangkat desa saat datang ke kantor.
            </p>
        </div>
    </div>

    {{-- LAYANAN DESA --}}
    <div class="card">
        <h2 class="card-title">Layanan Desa yang Tersedia</h2>

        <div class="services-grid">
            <div class="service-item">
                <div class="service-title">Surat Menyurat Desa</div>
                <div class="service-desc">
                    Ajukan berbagai jenis surat seperti domisili, SKTM, pengantar KTP, dan lainnya secara online.
                </div>
                <a href="{{ route('surat.index') }}" class="service-link">Buka layanan surat →</a>
            </div>

            <div class="service-item">
                <div class="service-title">Inventaris Desa</div>
                <div class="service-desc">
                    Transparansi aset desa: lihat daftar barang, fasilitas, dan sarana yang dimiliki dan dikelola desa.
                </div>
                <a href="{{ route('inventaris.public') }}" class="service-link">Lihat inventaris →</a>
            </div>

            <div class="service-item">
                <div class="service-title">Informasi & Panduan</div>
                <div class="service-desc">
                    Ikuti informasi di menu <strong>Beranda</strong> untuk mengetahui pengumuman dan jadwal pelayanan terbaru.
                </div>
                <a href="{{ route('home') }}" class="service-link">Kembali ke beranda →</a>
            </div>
        </div>
    </div>
</div>
@endsection
