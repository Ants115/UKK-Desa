@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2>Pengajuan Surat</h2>

    @if(session('success'))
        <div style="color: green; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

   <form method="POST" action="/surat" class="mt-3">
    @csrf

    <label>Jenis Surat:</label>
    <select name="jenis_surat" required>
        <option value="SK Domisili">Surat Domisili</option>
        <option value="SK Tidak Mampu">Surat Keterangan Tidak Mampu</option>
        <option value="Surat Pengantar KTP">Surat Pengantar KTP</option>

        <!-- Tambahan -->
        <option value="Surat Kelahiran">Surat Kelahiran</option>
        <option value="Surat Kematian">Surat Kematian</option>
        <option value="Surat Pengantar KUA">Surat Pengantar KUA</option>
    </select>

    <label>Keterangan (opsional):</label>
    <textarea name="keterangan" rows="3"></textarea>

    <button type="submit">Ajukan Surat</button>
</form>

    <hr>

    <h3>Status Pengajuan</h3>
    <table border="1" cellpadding="8">
        <tr>
            <th>Jenis Surat</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>

        @foreach($surat as $s)
        <tr>
            <td>{{ $s->jenis_surat }}</td>
            <td>{{ $s->keterangan }}</td>
            <td>{{ ucfirst($s->status) }}</td>
            <td>{{ $s->created_at->format('d M Y') }}</td>
        </tr>
        @endforeach
    </table>

</div>
@endsection