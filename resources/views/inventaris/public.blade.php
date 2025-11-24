@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Daftar Inventaris Desa</h2>
    <table class="table table-bordered mt-3">
        <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->kondisi }}</td>
                <td>{{ $item->lokasi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection