<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Warga</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">

    <h1>Halo, {{ $user->name ?? Auth::user()->name }} (Warga)</h1>

    <p>Selamat datang di Sistem Informasi Desa. Ini adalah halaman khusus untuk warga.</p>

    <hr>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
                style="padding: 10px 15px; background: #d31414; color: white; border: none; border-radius: 5px; cursor:pointer;">
            Logout
        </button>
    </form>

</body>
</html>