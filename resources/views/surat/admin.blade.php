@extends('layouts.app')

@section('content')
<style>
    .page-admin-surat {
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
    .badge-menunggu { background: #fff3cd; color: #856404; }
    .badge-disetujui { background: #d4edda; color: #155724; }
    .badge-ditolak { background: #f8d7da; color: #721c24; }
    .btn-detail {
        padding: 5px 10px;
        border-radius: 5px;
        border: none;
        background: #1a7f5a;
        color: #fff;
        font-size: 12px;
        cursor: pointer;
        text-decoration: none;
    }
    .btn-detail:hover {
        background: #145c42;
    }
    .badge-lampiran {
        background: #e3f2fd;
        color: #1565c0;
        padding: 3px 7px;
        border-radius: 999px;
        font-size: 11px;
    }
</style>

<div class="page-admin-surat">
    <h1 class="page-title">Pengajuan Surat Warga</h1>
    <p class="page-subtitle">
        Kelola permohonan surat keterangan dari warga desa.
    </p>

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
                    <th>Nama Warga</th>
                    <th>Jenis Surat</th>
                    <th>Keterangan Singkat</th>
                    <th>Lampiran</th>
                    <th>Status</th>
                    <th>Keputusan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($surat as $index => $s)
                    @php
                        $status = $s->status ?? 'menunggu';
                        $badgeClass = match ($status) {
                            'disetujui' => 'badge-disetujui',
                            'ditolak'   => 'badge-ditolak',
                            default     => 'badge-menunggu',
                        };
                        $dataTambahan = $s->data_tambahan ?? [];
                        $lampiran = is_array($dataTambahan) ? ($dataTambahan['lampiran'] ?? null) : null;
                    @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $s->user->name ?? '-' }}</td>
                        <td>{{ $s->jenis_surat }}</td>
                        <td>{{ $s->keterangan ?: '-' }}</td>
                        <td>
                            @if($lampiran)
                                <span class="badge-lampiran">Ada</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge {{ $badgeClass }}">
                                {{ ucfirst($status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.surat.show', $s->id) }}" class="btn-detail">
                                Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-muted">
                            Belum ada pengajuan surat.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
