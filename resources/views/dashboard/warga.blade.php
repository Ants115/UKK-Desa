@extends('layouts.app')

@section('title', 'Dashboard Warga - Sistem Informasi Desa')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card card-custom">
                <div class="card-body p-4">

                    <h1 class="h4 mb-2">
                        Halo, {{ $user->name ?? Auth::user()->name }} 👋
                    </h1>

                    <p class="text-muted mb-4">
                        Selamat datang di Sistem Informasi Desa. Ini adalah halaman khusus untuk warga
                        yang memudahkan Anda mengakses layanan publik desa secara digital.
                    </p>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <h2 class="h6 fw-bold mb-1">Pelayanan Surat-Menyurat</h2>
                                <p class="small text-muted mb-3">
                                    Ajukan permohonan surat keterangan tanpa harus antre lama di kantor desa.
                                </p>
                                <a href="{{ route('layanan.surat') }}" class="btn btn-success btn-sm rounded-pill px-3">
                                    Ajukan Surat
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <h2 class="h6 fw-bold mb-1">Informasi Inventaris Desa</h2>
                                <p class="small text-muted mb-3">
                                    Lihat data aset dan inventaris milik desa secara transparan.
                                </p>
                                <a href="{{ route('layanan.inventaris') }}" class="btn btn-outline-success btn-sm rounded-pill px-3">
                                    Lihat Inventaris
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 small text-muted">
                        Butuh bantuan? Silakan hubungi perangkat desa melalui kontak resmi yang tersedia
                        di kantor desa.
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
