@extends('layouts.admin')

@section('title', 'Edit Inventaris')

@section('content')
    <h1>Edit Inventaris</h1>
    <a href="{{ route('inventaris.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <form action="{{ route('inventaris.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="{{ old('nama_barang', $item->nama_barang) }}">
            @error('nama_barang') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah', $item->jumlah) }}">
            @error('jumlah') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Kondisi</label>
            <input type="text" name="kondisi" class="form-control" value="{{ old('kondisi', $item->kondisi) }}">
            @error('kondisi') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $item->lokasi) }}">
            @error('lokasi') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button class="btn btn-primary" type="submit">Update</button>
    </form>
@endsection