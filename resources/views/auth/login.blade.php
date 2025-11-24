@extends('layouts.auth')

@section('content')

<div class="container" style="max-width: 400px; margin:auto; padding-top:30px;">

    <h2 style="text-align:center; margin-bottom:20px;">Login User</h2>

    {{-- Notifikasi Error Login --}}
    @if (session('error'))
        <div style="background:#ffdddd; color:#b30000; padding:10px; border-radius:6px; margin-bottom:15px;">
            {{ session('error') }}
        </div>
    @endif

    {{-- Error Validasi --}}
    @if ($errors->any())
        <div style="background:#fff3cd; color:#856404; padding:10px; border-radius:6px; margin-bottom:15px;">
            <ul style="margin:0; padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.user.post') }}" method="POST">
        @csrf

        <div style="margin-bottom: 10px;">
            <input 
                type="email" 
                name="email" 
                placeholder="Email" 
                value="{{ old('email') }}" 
                required
                style="width:100%; padding:10px; border-radius:6px; border:1px solid #ccc;">
        </div>
        
        <div style="margin-bottom: 10px;">
            <input 
                type="password" 
                name="password" 
                placeholder="Password" 
                required
                style="width:100%; padding:10px; border-radius:6px; border:1px solid #ccc;">
        </div>

        <button 
            type="submit" 
            style="width:100%; background:#2e7d32; color:white; padding:10px; border:none; border-radius:6px; cursor:pointer;">
            Login
        </button>
    </form>

    <p style="text-align:center; margin-top:15px;">
        Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
    </p>

</div>

@endsection