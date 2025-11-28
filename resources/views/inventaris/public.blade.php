@extends('layouts.app')

@section('content')
<style>
    .page-inventaris-public {
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
        padding: 8px 10px;
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
    .text-muted { color: #777; font-size: 13px; }
</style>

<div class="page-inventaris-public">
    <h1 class="page-title">Daftar Inventaris Desa</h1>
    <p class="page-subtitle">
        Data berikut merupakan ringkasan aset milik desa yang tercatat dalam sistem.
        Informasi ini bersifat transparan untuk masyarakat.
    </p>

    <div class="card-table">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $index => $item)
                    @php
                        $badgeClass = match($item->kondisi) {
                            'Baik'          => 'badge-baik',
                            'Rusak Ringan'  => 'badge-ringan',
                            'Rusak Berat'   => 'badge-berat',
                            default         => 'badge-baik',
                        };
                    @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td><span class="badge {{ $badgeClass }}">{{ $item->kondisi }}</span></td>
                        <td>{{ $item->lokasi }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-muted">
                            Belum ada data inventaris yang dapat ditampilkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
