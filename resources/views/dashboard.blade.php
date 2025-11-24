@extends('layouts.app')

@section('content')
<section class="hero justify-content-center text-center">
    <div class="hero-text">

        <h1>Selamat Datang di Dashboard</h1>
        <p class="welcome">Halo, <strong>{{ Auth::user()->name }}</strong> 👋</p>
        <a href="{{ route('home') }}" class="btn-green  text-light px-4 py-2">Kembali ke Beranda</a>
    </div>
</section>  
 @endsection