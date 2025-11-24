@extends('layouts.auth')

@section('content')

<div class="container" style="max-width: 450px; margin:auto; padding-top:30px;">

    <h2 style="text-align:center; margin-bottom:20px;">Register</h2>

    {{-- Error Validasi --}}
    @if ($errors->any())
        <div style="background:#fff3cd; color:#856404; padding:10px; border-radius:6px; margin-bottom:15px;">
            <ul style="margin:0; padding-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required
            style="width:100%; padding:10px; margin-bottom:10px; border-radius:6px; border:1px solid #ccc;">

        <input type="text" name="username" placeholder="Username (opsional)" value="{{ old('username') }}"
            style="width:100%; padding:10px; margin-bottom:10px; border-radius:6px; border:1px solid #ccc;">

        <input type="text" name="nik" placeholder="NIK (opsional)" value="{{ old('nik') }}"
            style="width:100%; padding:10px; margin-bottom:10px; border-radius:6px; border:1px solid #ccc;">

        <input type="text" name="no_hp" placeholder="No HP (opsional)" value="{{ old('no_hp') }}"
            style="width:100%; padding:10px; margin-bottom:10px; border-radius:6px; border:1px solid #ccc;">

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
            style="width:100%; padding:10px; margin-bottom:10px; border-radius:6px; border:1px solid #ccc;">

        <input type="password" name="password" placeholder="Password" required
            style="width:100%; padding:10px; margin-bottom:10px; border-radius:6px; border:1px solid #ccc;">

        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required
            style="width:100%; padding:10px; margin-bottom:15px; border-radius:6px; border:1px solid #ccc;">

        <button type="submit"
            style="width:100%; background:#2e7d32; color:white; padding:10px; border:none; border-radius:6px; cursor:pointer;">
            Register
        </button>
    </form>

    <p style="text-align:center; margin-top:15px;">
        Sudah punya akun? <a href="{{ route('login') }}">Login</a>
    </p>

</div>

@endsection