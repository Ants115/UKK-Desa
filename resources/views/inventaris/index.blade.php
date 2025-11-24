@extends('layouts.admin')

@section('title', 'Inventaris Desa')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Inventaris Desa</h2>
    <a href="{{ route('inventaris.create') }}" class="btn btn-green">Tambah Barang</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered bg-white">
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
        @foreach($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->kondisi }}</td>
            <td>{{ $item->lokasi }}</td>
            <td>
                <a href="{{ route('inventaris.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection