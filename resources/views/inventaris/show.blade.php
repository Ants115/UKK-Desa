@extends('layouts.admin')

@section('title', 'Detail Inventaris')

@section('content')
<style>
    .page-detail-inventaris {
        max-width: 900px;
        margin: 30px auto;
        padding: 0 15px;
        font-family: Arial, sans-serif;
    }
    .card {
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        padding: 20px 25px;
        margin-bottom: 20px;
    }
    .page-title {
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #1b3b2f;
    }
    .label { font-weight: 600; color: #444; }
    .value { color: #333; }
    .badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 600;
    }
    .badge-baik { background: #d4edda; color: #155724; }
    .badge-ringan { background: #fff3cd; color: #856404; }
    .badge-berat { background: #f8d7da; color: #721c24; }
</style>

@php
    $badgeClass = match($item->kondisi) {
        'Baik'          => 'badge-baik',
        'Rusak Ringan'  => 'badge-ringan',
        'Rusak Berat'   => 'badge-berat',
        default         => 'badge-baik',
    };
@endphp

<div class="page-detail-inventaris">
    <a href="{{ route('inventaris.index') }}" class="btn btn-secondary mb-3">← Kembali ke daftar</a>

    <div class="card">
        <h1 class="page-title">{{ $item->nama_barang }}</h1>

        <p><span class="label">ID:</span> <span class="value">{{ $item->id }}</span></p>

        @if($item->kode_barang)
            <p><span class="label">Kode Barang:</span> <span class="value">{{ $item->kode_barang }}</span></p>
        @endif

        <p><span class="label">Jumlah:</span> <span class="value">{{ $item->jumlah }}</span></p>

        <p>
            <span class="label">Kondisi:</span>
            <span class="badge {{ $badgeClass }}">{{ $item->kondisi }}</span>
        </p>

        <p><span class="label">Lokasi:</span> <span class="value">{{ $item->lokasi }}</span></p>

        <p><span class="label">Keterangan:</span>
            <span class="value">{{ $item->keterangan ?: '-' }}</span>
        </p>

        <p class="text-muted mt-3">
            Terakhir diperbarui: {{ $item->updated_at?->format('d-m-Y H:i') ?? '-' }}
        </p>

        <div class="mt-3">
            <a href="{{ route('inventaris.edit', $item->id) }}" class="btn btn-primary">
                Edit data ini
            </a>
            <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST"
                  style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
