{{-- resources/views/surat/show/admin.blade.php --}}
@extends('layouts.app')

@section('title', 'Detail Surat')

@section('content')
<div class="container mt-4">
    <h1>Detail Surat</h1>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">{{ $surat->jenis_surat }}</h5>

            <p><strong>ID:</strong> {{ $surat->id }}</p>
            <p><strong>Nama Pemohon:</strong> {{ $surat->user->name ?? '-' }}</p>
            <p><strong>Keterangan:</strong> {{ $surat->keterangan }}</p>
            <p><strong>Status:</strong> {{ ucfirst($surat->status) }}</p>
            <p><strong>Tipe Pengajuan:</strong> {{ ucfirst($surat->tipe_pengajuan) }}</p>

            @php
                // kalau di model sudah di-cast ke array, ini aman
                $data = is_array($surat->data_tambahan) ? $surat->data_tambahan : json_decode($surat->data_tambahan ?? '[]', true);
            @endphp

            @if(!empty($data))
                <hr>
                <h6>Data Tambahan</h6>
                <ul>
                    @foreach($data as $key => $value)
                        <li><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="mt-3 d-flex gap-2">
        {{-- Tombol setujui --}}
        <form action="{{ route('admin.surat.setujui', $surat->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success"
                    onclick="return confirm('Setujui surat ini?')">
                Setujui
            </button>
        </form>

        {{-- Tombol tolak --}}
        <form action="{{ route('admin.surat.tolak', $surat->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Tolak surat ini?')">
                Tolak
            </button>
        </form>

        <a href="{{ route('admin.surat') }}" class="btn btn-secondary">
            Kembali ke daftar
        </a>
    </div>
</div>
@endsection
