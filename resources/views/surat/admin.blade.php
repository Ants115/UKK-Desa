@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2>Daftar Pengajuan Surat Warga</h2>

    @if(session('success'))
        <div style="color: green; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1" cellpadding="8">
        <tr>
            <th>Nama Warga</th>
            <th>Jenis Surat</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        @foreach($surat as $s)
        <tr>
            <td>{{ $s->user->name }}</td>
            <td>{{ $s->jenis_surat }}</td>
            <td>{{ $s->keterangan }}</td>
            <td>{{ ucfirst($s->status) }}</td>
            <td>
                @if($s->status == 'menunggu')
                    <form method="POST" action="/admin/surat/{{ $s->id }}/setujui" style="display:inline;">
                        @csrf
                        <button>Setujui</button>
                    </form>
                    <form method="POST" action="/admin/surat/{{ $s->id }}/tolak" style="display:inline;">
                        @csrf
                        <button>Tolak</button>
                    </form>
                @else
                    {{ ucfirst($s->status) }}
                @endif
            </td>
        </tr>
        @endforeach

    </table>

</div>
@endsection