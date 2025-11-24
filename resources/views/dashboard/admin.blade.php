@extends('layouts.app')

@section('content')
<style>
    .dashboard-container {
        text-align: center;
        padding: 80px 20px;
        background: #e8f5e9; /* warna hijau muda */
        min-height: 70vh;
    }

    .dashboard-title {
        font-size: 48px;
        font-weight: bold;
        color: #2e7d32; /* hijau tua */
    }

    .dashboard-subtitle {
        margin-top: 10px;
        font-size: 20px;
        color: #333;
    }
</style>

<div class="dashboard-container">
    <h1 class="dashboard-title">Selamat Datang di Dashboard Admin</h1>

    <p class="dashboard-subtitle">
        Halo, <strong>{{ Auth::user()->name }}</strong> 👋
    </p>

    <a href="{{ url('/') }}"
        style="margin-top: 25px; display: inline-block; padding: 10px 25px;
        background: #2e7d32; color:white; border-radius:25px; text-decoration:none; font-weight: bold;">
        Kembali ke Beranda
    </a>
</div>

@endsection