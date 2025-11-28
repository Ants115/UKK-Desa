@extends('layouts.admin')

@section('title', 'Inventaris Desa')

@section('content')
<style>
    .page-admin-inventaris {
        max-width: 1100px;
        margin: 30px auto;
        padding: 0 15px;
        font-family: Arial, sans-serif;
    }
    .page-title {
        font-size: 26px;
        font-weight: bold;
        margin-bottom: 5px;
        color: #1b3b2f;
    }
    .page-subtitle {
        color: #555;
        font-size: 14px;
        margin-bottom: 20px;
    }
    .card-table {
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        padding: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
    }
    thead {
        background: #f4f6f8;
    }
    th, td {
        padding: 10px 12px;
        border-bottom: 1px solid #e2e5e9;
        text-align: left;
        white-space: nowrap;
    }
    th {
        font-weight: 600;
        color: #444;
    }
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
    .btn-detail {
        padding: 5px 10px;
        border-radius: 5px;
        border: none;
        background: #1a7f5a;
        color: #fff;
        font-size: 12px;
        cursor: pointer;
        text-decoration: none;
        margin-right: 4px;
    }
    .btn-detail:hover { background: #145c42; }
</style>

<div class="page-admin-inventaris">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <div>
            <h1 class="page-title">Data Inventaris Desa</h1>
            <p class="page-subtitle">
                Kelola aset dan barang milik desa (tanah, bangunan, peralatan, dan lainnya).
            </p>
        </div>
        <div>
            <a href="{{ route('inventaris.create') }}" class="btn btn-green">
                Tambah Barang
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success" style="margin-bottom:15px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card-table">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                    @php
                        $badgeClass = match($item->kondisi) {
                            'Baik'          => 'badge-baik',
                            'Rusak Ringan'  => 'badge-ringan',
                            'Rusak Berat'   => 'badge-berat',
                            default         => 'badge-baik',
                        };
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>
                            <span class="badge {{ $badgeClass }}">{{ $item->kondisi }}</span>
                        </td>
                        <td>{{ $item->lokasi }}</td>
                        <td>
                            <a href="{{ route('inventaris.show', $item->id) }}" class="btn-detail">
                                Detail
                            </a>
                            <a href="{{ route('inventaris.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                Edit
                            </a>
                            <form action="{{ route('inventaris.destroy', $item->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-muted">
                            Belum ada data inventaris yang tercatat.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
