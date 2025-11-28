@extends('layouts.admin')

@section('title', 'Tambah Inventaris')

@section('content')
<style>
    .page-inventaris-form {
        max-width: 800px;
        margin: 30px auto;
        padding: 0 15px;
        font-family: Arial, sans-serif;
    }
    .card-form {
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        padding: 20px 25px;
    }
    .form-title {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 15px;
        color: #1b3b2f;
    }
    .form-group label {
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 4px;
    }
</style>

<div class="page-inventaris-form">
    <a href="{{ route('inventaris.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card-form">
        <h1 class="form-title">Tambah Data Inventaris</h1>

        <form action="{{ route('inventaris.store') }}" method="POST">
            @csrf

            <div class="mb-3 form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control"
                       value="{{ old('nama_barang') }}">
                @error('nama_barang') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3 form-group">
                <label>Kode Barang (opsional)</label>
                <input type="text" name="kode_barang" class="form-control"
                       value="{{ old('kode_barang') }}"
                       placeholder="Contoh: INV-001 / KIB-A-01">
                @error('kode_barang') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="row">
                <div class="col-md-4 mb-3 form-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" min="0"
                           value="{{ old('jumlah', 1) }}">
                    @error('jumlah') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4 mb-3 form-group">
                    <label>Kondisi</label>
                    <select name="kondisi" class="form-control">
                        <option value="">-- Pilih Kondisi --</option>
                        <option value="Baik" {{ old('kondisi')=='Baik' ? 'selected' : '' }}>Baik</option>
                        <option value="Rusak Ringan" {{ old('kondisi')=='Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                        <option value="Rusak Berat" {{ old('kondisi')=='Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                    </select>
                    @error('kondisi') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4 mb-3 form-group">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" class="form-control"
                           value="{{ old('lokasi') }}" placeholder="Contoh: Balai Desa, Gudang 1">
                    @error('lokasi') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-3 form-group">
                <label>Keterangan (opsional)</label>
                <textarea name="keterangan" rows="3" class="form-control"
                          placeholder="Contoh: Tanah kas desa, pembelian tahun 2023.">{{ old('keterangan') }}</textarea>
                @error('keterangan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button class="btn btn-success" type="submit">Simpan</button>
            <a href="{{ route('inventaris.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
