{{-- resources/views/surat/warga.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    .page-surat {
        max-width: 1100px;
        margin: 30px auto;
        padding: 0 15px;
        font-family: Arial, sans-serif;
    }

    .page-surat-header {
        margin-bottom: 20px;
    }

    .page-surat-title {
        font-size: 26px;
        font-weight: bold;
        margin-bottom: 5px;
        color: #1b3b2f;
    }

    .page-surat-subtitle {
        color: #555;
        font-size: 14px;
    }

    .page-surat-layout {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .card {
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        padding: 20px;
        flex: 1 1 320px;
    }

    .card-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 15px;
        color: #1b3b2f;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
        font-weight: 600;
        color: #333;
    }

    .form-control, .form-select, textarea {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #ccd0d5;
        border-radius: 5px;
        font-size: 14px;
        box-sizing: border-box;
    }

    .form-control:focus,
    .form-select:focus,
    textarea:focus {
        outline: none;
        border-color: #1a7f5a;
        box-shadow: 0 0 0 2px rgba(26,127,90,0.15);
    }

    .btn-primary {
        background: #1a7f5a;
        border: none;
        color: #fff;
        padding: 9px 18px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    .btn-primary:hover {
        background: #145c42;
    }

    .alert {
        padding: 10px 14px;
        border-radius: 6px;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .alert-success {
        background: #e6f7ec;
        border: 1px solid #b6e2c5;
        color: #1a7f5a;
    }

    .alert-danger {
        background: #fdecea;
        border: 1px solid #f5c2c0;
        color: #b02a37;
    }

    .badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 600;
    }

    .badge-menunggu {
        background: #fff3cd;
        color: #856404;
    }

    .badge-disetujui {
        background: #d4edda;
        color: #155724;
    }

    .badge-ditolak {
        background: #f8d7da;
        color: #721c24;
    }

    .table-wrapper {
        margin-top: 10px;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
    }

    table thead {
        background: #f4f6f8;
    }

    table th, table td {
        padding: 8px 10px;
        border-bottom: 1px solid #e2e5e9;
        text-align: left;
        white-space: nowrap;
    }

    table th {
        font-weight: 600;
        color: #444;
    }

    .text-muted {
        color: #777;
        font-size: 13px;
    }

    .badge-mode {
        font-size: 11px;
        padding: 3px 7px;
        border-radius: 999px;
        background: #e3f2fd;
        color: #1565c0;
        margin-left: 4px;
    }

    .mode-help {
        font-size: 12px;
        color: #666;
    }

    .section-online-detail {
        margin-top: 15px;
        padding: 12px 14px;
        border-radius: 8px;
        background: #f1f8e9;
        border: 1px solid #d4e6b5;
    }

    .section-online-detail h3 {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
        color: #33691e;
    }

    .section-online-detail small {
        font-size: 12px;
        color: #555;
    }

    @media (max-width: 768px) {
        .page-surat {
            margin-top: 20px;
        }
        .page-surat-layout {
            flex-direction: column;
        }
    }
</style>

<div class="page-surat">
    {{-- HEADER --}}
    <div class="page-surat-header">
        <h1 class="page-surat-title">Pengajuan Surat Desa</h1>
        <p class="page-surat-subtitle">
            Ajukan permohonan surat keterangan secara online. Pastikan data yang Anda isi sudah benar.
        </p>
    </div>

    {{-- NOTIFIKASI --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul style="margin: 5px 0 0 18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="page-surat-layout">
        {{-- FORM PENGAJUAN --}}
        <div class="card">
            <h2 class="card-title">Form Pengajuan Surat</h2>

            <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- TIPE PENGAJUAN --}}
                <div class="form-group">
                    <label>Jenis Pengajuan</label>
                    @php
                        $tipeOld = old('tipe_pengajuan', 'manual');
                    @endphp
                    <div>
                        <label style="font-weight:400; font-size:13px; margin-right:10px;">
                            <input type="radio" name="tipe_pengajuan" value="manual"
                                   {{ $tipeOld === 'manual' ? 'checked' : '' }}>
                            Pengajuan Cepat (isi singkat, lanjut di kantor desa)
                        </label>
                    </div>
                    <div>
                        <label style="font-weight:400; font-size:13px;">
                            <input type="radio" name="tipe_pengajuan" value="online"
                                   {{ $tipeOld === 'online' ? 'checked' : '' }}>
                            Pengajuan Online Lengkap
                            <span class="badge-mode">disarankan</span>
                        </label>
                    </div>
                    <div class="mode-help mt-1">
                        Pilih <strong>Pengajuan Online Lengkap</strong> untuk mengisi data detail sehingga proses di kantor desa lebih cepat.
                    </div>
                </div>

                {{-- JENIS SURAT --}}
                <div class="form-group">
                    <label for="jenis_surat">Jenis Surat</label>
                    <select name="jenis_surat" id="jenis_surat" class="form-select" required>
                        <option value="">-- Pilih Jenis Surat --</option>
                        <option value="Surat Domisili" {{ old('jenis_surat')=='Surat Domisili' ? 'selected' : '' }}>Surat Domisili</option>
                        <option value="Surat Keterangan Tidak Mampu" {{ old('jenis_surat')=='Surat Keterangan Tidak Mampu' ? 'selected' : '' }}>Surat Keterangan Tidak Mampu (SKTM)</option>
                        <option value="Surat Pengantar KTP" {{ old('jenis_surat')=='Surat Pengantar KTP' ? 'selected' : '' }}>Surat Pengantar KTP</option>
                        <option value="Surat Kelahiran" {{ old('jenis_surat')=='Surat Kelahiran' ? 'selected' : '' }}>Surat Kelahiran</option>
                        <option value="Surat Kematian" {{ old('jenis_surat')=='Surat Kematian' ? 'selected' : '' }}>Surat Kematian</option>
                        <option value="Surat Pengantar KUA" {{ old('jenis_surat')=='Surat Pengantar KUA' ? 'selected' : '' }}>Surat Pengantar KUA</option>
                        <option value="Surat Keterangan Usaha" {{ old('jenis_surat')=='Surat Keterangan Usaha' ? 'selected' : '' }}>Surat Keterangan Usaha</option>
                        <option value="Surat Keterangan Belum Menikah" {{ old('jenis_surat')=='Surat Keterangan Belum Menikah' ? 'selected' : '' }}>Surat Keterangan Belum Menikah</option>
                        <option value="Surat Keterangan Tanah" {{ old('jenis_surat')=='Surat Keterangan Tanah' ? 'selected' : '' }}>Surat Keterangan Tanah</option>
                        <option value="Surat Undangan Rapat" {{ old('jenis_surat')=='Surat Undangan Rapat' ? 'selected' : '' }}>Surat Undangan Rapat</option>
                    </select>
                </div>

                {{-- KETERANGAN DASAR --}}
                <div class="form-group">
                    <label for="keterangan">Keterangan / Keperluan (opsional)</label>
                    <textarea name="keterangan" id="keterangan" rows="3" class="form-control"
                        placeholder="Contoh: Untuk keperluan pengurusan KTP di Disdukcapil.">{{ old('keterangan') }}</textarea>
                </div>

                {{-- DETAIL PENGAJUAN ONLINE --}}
                <div id="section-online-wrapper" style="display:none;">

                    {{-- DOMISILI --}}
                    <div id="section-online-domisili" class="section-online-detail" style="display:none;">
                        <h3>Data Tambahan – Surat Domisili</h3>
                        <small>Lengkapi data berikut untuk pembuatan surat keterangan domisili.</small>

                        <div class="form-group mt-2">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" id="nik" class="form-control"
                                   value="{{ old('nik') }}" placeholder="16 digit NIK pada KTP">
                        </div>
                        <div class="form-group">
                            <label for="alamat_ktp">Alamat sesuai KTP</label>
                            <textarea name="alamat_ktp" id="alamat_ktp" rows="2" class="form-control"
                                      placeholder="Alamat lengkap sesuai KTP">{{ old('alamat_ktp') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="alamat_domisili">Alamat Domisili Saat Ini</label>
                            <textarea name="alamat_domisili" id="alamat_domisili" rows="2" class="form-control"
                                      placeholder="Alamat tempat tinggal sekarang (RT/RW/Dusun)">{{ old('alamat_domisili') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="lama_tinggal">Lama Tinggal</label>
                            <input type="text" name="lama_tinggal" id="lama_tinggal" class="form-control"
                                   value="{{ old('lama_tinggal') }}" placeholder="Contoh: 3 tahun">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomor HP yang dapat dihubungi</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control"
                                   value="{{ old('no_hp') }}" placeholder="Contoh: 08xxxxxxxxxx">
                        </div>
                    </div>

                    {{-- USAHA --}}
                    <div id="section-online-usaha" class="section-online-detail" style="display:none;">
                        <h3>Data Tambahan – Surat Keterangan Usaha</h3>
                        <small>Lengkapi data usaha Anda untuk keperluan SKU.</small>

                        <div class="form-group mt-2">
                            <label for="nama_usaha">Nama Usaha</label>
                            <input type="text" name="nama_usaha" id="nama_usaha" class="form-control"
                                   value="{{ old('nama_usaha') }}" placeholder="Contoh: Warung Sembako Makmur">
                        </div>
                        <div class="form-group">
                            <label for="alamat_usaha">Alamat Usaha</label>
                            <textarea name="alamat_usaha" id="alamat_usaha" rows="2" class="form-control"
                                      placeholder="Alamat lengkap lokasi usaha">{{ old('alamat_usaha') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="jenis_usaha">Jenis Usaha</label>
                            <input type="text" name="jenis_usaha" id="jenis_usaha" class="form-control"
                                   value="{{ old('jenis_usaha') }}" placeholder="Contoh: Warung kelontong, bengkel, dll.">
                        </div>
                        <div class="form-group">
                            <label for="lama_usaha">Lama Usaha Berjalan</label>
                            <input type="text" name="lama_usaha" id="lama_usaha" class="form-control"
                                   value="{{ old('lama_usaha') }}" placeholder="Contoh: 2 tahun">
                        </div>
                        <div class="form-group">
                            <label for="no_hp_usaha">Nomor HP yang dapat dihubungi</label>
                            <input type="text" name="no_hp" id="no_hp_usaha" class="form-control"
                                   value="{{ old('no_hp') }}" placeholder="Contoh: 08xxxxxxxxxx">
                        </div>
                    </div>

                    {{-- SKTM --}}
                    <div id="section-online-sktm" class="section-online-detail" style="display:none;">
                        <h3>Data Tambahan – Surat Keterangan Tidak Mampu (SKTM)</h3>
                        <small>Data ini digunakan untuk keperluan SKTM (beasiswa, sekolah, rumah sakit, dll).</small>

                        <div class="form-group mt-2">
                            <label for="nik_sktm">NIK</label>
                            <input type="text" name="nik_sktm" id="nik_sktm" class="form-control"
                                   value="{{ old('nik_sktm') }}" placeholder="16 digit NIK">
                        </div>
                        <div class="form-group">
                            <label for="nama_sktm">Nama Lengkap</label>
                            <input type="text" name="nama_sktm" id="nama_sktm" class="form-control"
                                   value="{{ old('nama_sktm') }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat_sktm">Alamat</label>
                            <textarea name="alamat_sktm" id="alamat_sktm" rows="2" class="form-control">{{ old('alamat_sktm') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tujuan_sktm">Untuk Keperluan</label>
                            <input type="text" name="tujuan_sktm" id="tujuan_sktm" class="form-control"
                                   value="{{ old('tujuan_sktm') }}" placeholder="Contoh: Beasiswa sekolah, keringanan biaya RS, dll.">
                        </div>
                        <div class="form-group">
                            <label for="instansi_sktm">Instansi Tujuan</label>
                            <input type="text" name="instansi_sktm" id="instansi_sktm" class="form-control"
                                   value="{{ old('instansi_sktm') }}" placeholder="Contoh: SMPN 1, Rumah Sakit, dll.">
                        </div>
                    </div>

                    {{-- PENGANTAR KTP --}}
                    <div id="section-online-ktp" class="section-online-detail" style="display:none;">
                        <h3>Data Tambahan – Surat Pengantar KTP</h3>
                        <small>Data ini akan digunakan untuk pembuatan/penggantian KTP.</small>

                        <div class="form-group mt-2">
                            <label for="nik_ktp">NIK</label>
                            <input type="text" name="nik_ktp" id="nik_ktp" class="form-control"
                                   value="{{ old('nik_ktp') }}" placeholder="16 digit NIK">
                        </div>
                        <div class="form-group">
                            <label for="nama_ktp">Nama Lengkap</label>
                            <input type="text" name="nama_ktp" id="nama_ktp" class="form-control"
                                   value="{{ old('nama_ktp') }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat_ktp_ktp">Alamat</label>
                            <textarea name="alamat_ktp_ktp" id="alamat_ktp_ktp" rows="2" class="form-control">{{ old('alamat_ktp_ktp') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="jenis_permohonan">Jenis Permohonan</label>
                            <select name="jenis_permohonan" id="jenis_permohonan" class="form-select">
                                <option value="">-- Pilih --</option>
                                <option value="Baru" {{ old('jenis_permohonan')=='Baru' ? 'selected' : '' }}>Baru</option>
                                <option value="Perubahan Data" {{ old('jenis_permohonan')=='Perubahan Data' ? 'selected' : '' }}>Perubahan Data</option>
                                <option value="Hilang" {{ old('jenis_permohonan')=='Hilang' ? 'selected' : '' }}>Hilang</option>
                                <option value="Rusak" {{ old('jenis_permohonan')=='Rusak' ? 'selected' : '' }}>Rusak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alasan_permohonan">Alasan Permohonan (opsional)</label>
                            <textarea name="alasan_permohonan" id="alasan_permohonan" rows="2" class="form-control">{{ old('alasan_permohonan') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_hp_ktp">Nomor HP yang dapat dihubungi</label>
                            <input type="text" name="no_hp_ktp" id="no_hp_ktp" class="form-control"
                                   value="{{ old('no_hp_ktp') }}" placeholder="Contoh: 08xxxxxxxxxx">
                        </div>
                    </div>

                    {{-- KELAHIRAN --}}
                    <div id="section-online-kelahiran" class="section-online-detail" style="display:none;">
                        <h3>Data Tambahan – Surat Kelahiran</h3>
                        <small>Data ini digunakan untuk pembuatan surat keterangan kelahiran.</small>

                        <div class="form-group mt-2">
                            <label for="nama_bayi">Nama Bayi</label>
                            <input type="text" name="nama_bayi" id="nama_bayi" class="form-control"
                                   value="{{ old('nama_bayi') }}">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin_bayi">Jenis Kelamin Bayi</label>
                            <select name="jenis_kelamin_bayi" id="jenis_kelamin_bayi" class="form-select">
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin_bayi')=='Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin_bayi')=='Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir_bayi">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir_bayi" id="tempat_lahir_bayi" class="form-control"
                                   value="{{ old('tempat_lahir_bayi') }}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir_bayi">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir_bayi" id="tanggal_lahir_bayi" class="form-control"
                                   value="{{ old('tanggal_lahir_bayi') }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" name="nama_ayah" id="nama_ayah" class="form-control"
                                   value="{{ old('nama_ayah') }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" name="nama_ibu" id="nama_ibu" class="form-control"
                                   value="{{ old('nama_ibu') }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat_orangtua">Alamat Orang Tua</label>
                            <textarea name="alamat_orangtua" id="alamat_orangtua" rows="2" class="form-control">{{ old('alamat_orangtua') }}</textarea>
                        </div>
                    </div>

                    {{-- KEMATIAN --}}
                    <div id="section-online-kematian" class="section-online-detail" style="display:none;">
                        <h3>Data Tambahan – Surat Kematian</h3>
                        <small>Data ini digunakan untuk pembuatan surat keterangan kematian.</small>

                        <div class="form-group mt-2">
                            <label for="nama_almarhum">Nama Almarhum/Almarhumah</label>
                            <input type="text" name="nama_almarhum" id="nama_almarhum" class="form-control"
                                   value="{{ old('nama_almarhum') }}">
                        </div>
                        <div class="form-group">
                            <label for="nik_almarhum">NIK Almarhum/Almarhumah</label>
                            <input type="text" name="nik_almarhum" id="nik_almarhum" class="form-control"
                                   value="{{ old('nik_almarhum') }}" placeholder="16 digit NIK">
                        </div>
                        <div class="form-group">
                            <label for="alamat_almarhum">Alamat Almarhum/Almarhumah</label>
                            <textarea name="alamat_almarhum" id="alamat_almarhum" rows="2" class="form-control">{{ old('alamat_almarhum') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_meninggal">Tanggal Meninggal</label>
                            <input type="date" name="tanggal_meninggal" id="tanggal_meninggal" class="form-control"
                                   value="{{ old('tanggal_meninggal') }}">
                        </div>
                        <div class="form-group">
                            <label for="tempat_meninggal">Tempat Meninggal</label>
                            <input type="text" name="tempat_meninggal" id="tempat_meninggal" class="form-control"
                                   value="{{ old('tempat_meninggal') }}" placeholder="Contoh: Rumah, Rumah Sakit, dsb.">
                        </div>
                        <div class="form-group">
                            <label for="sebab_meninggal">Sebab Meninggal (opsional)</label>
                            <textarea name="sebab_meninggal" id="sebab_meninggal" rows="2" class="form-control">{{ old('sebab_meninggal') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="hubungan_pemohon">Hubungan Pemohon dengan Almarhum</label>
                            <input type="text" name="hubungan_pemohon" id="hubungan_pemohon" class="form-control"
                                   value="{{ old('hubungan_pemohon') }}" placeholder="Contoh: Anak, Istri, Suami, dsb.">
                        </div>
                    </div>

                    {{-- PENGANTAR KUA --}}
                    <div id="section-online-kua" class="section-online-detail" style="display:none;">
                        <h3>Data Tambahan – Surat Pengantar KUA</h3>
                        <small>Lengkapi data calon pengantin dan rencana pernikahan.</small>

                        <div class="form-group mt-2">
                            <label for="nama_calon_suami">Nama Calon Suami</label>
                            <input type="text" name="nama_calon_suami" id="nama_calon_suami" class="form-control"
                                   value="{{ old('nama_calon_suami') }}">
                        </div>
                        <div class="form-group">
                            <label for="nik_calon_suami">NIK Calon Suami</label>
                            <input type="text" name="nik_calon_suami" id="nik_calon_suami" class="form-control"
                                   value="{{ old('nik_calon_suami') }}" placeholder="16 digit NIK">
                        </div>
                        <div class="form-group">
                            <label for="alamat_calon_suami">Alamat Calon Suami</label>
                            <textarea name="alamat_calon_suami" id="alamat_calon_suami" rows="2" class="form-control">{{ old('alamat_calon_suami') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="nama_calon_istri">Nama Calon Istri</label>
                            <input type="text" name="nama_calon_istri" id="nama_calon_istri" class="form-control"
                                   value="{{ old('nama_calon_istri') }}">
                        </div>
                        <div class="form-group">
                            <label for="nik_calon_istri">NIK Calon Istri</label>
                            <input type="text" name="nik_calon_istri" id="nik_calon_istri" class="form-control"
                                   value="{{ old('nik_calon_istri') }}" placeholder="16 digit NIK">
                        </div>
                        <div class="form-group">
                            <label for="alamat_calon_istri">Alamat Calon Istri</label>
                            <textarea name="alamat_calon_istri" id="alamat_calon_istri" rows="2" class="form-control">{{ old('alamat_calon_istri') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_nikah">Rencana Tanggal Nikah</label>
                            <input type="date" name="tanggal_nikah" id="tanggal_nikah" class="form-control"
                                   value="{{ old('tanggal_nikah') }}">
                        </div>
                        <div class="form-group">
                            <label for="tempat_nikah">Tempat Akad Nikah</label>
                            <input type="text" name="tempat_nikah" id="tempat_nikah" class="form-control"
                                   value="{{ old('tempat_nikah') }}" placeholder="Contoh: KUA, rumah, gedung, dll.">
                        </div>
                    </div>

                    {{-- BELUM MENIKAH --}}
                    <div id="section-online-belum-menikah" class="section-online-detail" style="display:none;">
                        <h3>Data Tambahan – Surat Keterangan Belum Menikah</h3>
                        <small>Digunakan untuk keperluan pekerjaan, kuliah, atau keperluan lain yang membutuhkan status belum menikah.</small>

                        <div class="form-group mt-2">
                            <label for="nik_belum_menikah">NIK</label>
                            <input type="text" name="nik_belum_menikah" id="nik_belum_menikah" class="form-control"
                                   value="{{ old('nik_belum_menikah') }}" placeholder="16 digit NIK">
                        </div>
                        <div class="form-group">
                            <label for="nama_belum_menikah">Nama Lengkap</label>
                            <input type="text" name="nama_belum_menikah" id="nama_belum_menikah" class="form-control"
                                   value="{{ old('nama_belum_menikah') }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat_belum_menikah">Alamat</label>
                            <textarea name="alamat_belum_menikah" id="alamat_belum_menikah" rows="2" class="form-control">{{ old('alamat_belum_menikah') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tujuan_belum_menikah">Untuk Keperluan</label>
                            <input type="text" name="tujuan_belum_menikah" id="tujuan_belum_menikah" class="form-control"
                                   value="{{ old('tujuan_belum_menikah') }}" placeholder="Contoh: Melamar pekerjaan, kuliah, dll.">
                        </div>
                        <div class="form-group">
                            <label for="instansi_belum_menikah">Instansi Tujuan</label>
                            <input type="text" name="instansi_belum_menikah" id="instansi_belum_menikah" class="form-control"
                                   value="{{ old('instansi_belum_menikah') }}" placeholder="Contoh: Nama perusahaan, kampus, dll.">
                        </div>
                    </div>

                    {{-- KETERANGAN TANAH --}}
                    <div id="section-online-tanah" class="section-online-detail" style="display:none;">
                        <h3>Data Tambahan – Surat Keterangan Tanah</h3>
                        <small>Data ini akan digunakan untuk keterangan kepemilikan dan kondisi tanah.</small>

                        <div class="form-group mt-2">
                            <label for="lokasi_tanah">Lokasi Tanah</label>
                            <textarea name="lokasi_tanah" id="lokasi_tanah" rows="2" class="form-control"
                                      placeholder="Alamat lengkap lokasi tanah">{{ old('lokasi_tanah') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="luas_tanah">Luas Tanah</label>
                            <input type="text" name="luas_tanah" id="luas_tanah" class="form-control"
                                   value="{{ old('luas_tanah') }}" placeholder="Contoh: 200 m2">
                        </div>
                        <div class="form-group">
                            <label for="peruntukan">Peruntukan Tanah</label>
                            <input type="text" name="peruntukan" id="peruntukan" class="form-control"
                                   value="{{ old('peruntukan') }}" placeholder="Contoh: Sawah, pekarangan, rumah, usaha, dll.">
                        </div>
                        <div class="form-group">
                            <label for="batas_utara">Batas Utara</label>
                            <input type="text" name="batas_utara" id="batas_utara" class="form-control"
                                   value="{{ old('batas_utara') }}">
                        </div>
                        <div class="form-group">
                            <label for="batas_selatan">Batas Selatan</label>
                            <input type="text" name="batas_selatan" id="batas_selatan" class="form-control"
                                   value="{{ old('batas_selatan') }}">
                        </div>
                        <div class="form-group">
                            <label for="batas_timur">Batas Timur</label>
                            <input type="text" name="batas_timur" id="batas_timur" class="form-control"
                                   value="{{ old('batas_timur') }}">
                        </div>
                        <div class="form-group">
                            <label for="batas_barat">Batas Barat</label>
                            <input type="text" name="batas_barat" id="batas_barat" class="form-control"
                                   value="{{ old('batas_barat') }}">
                        </div>
                    </div>

                    {{-- UNDANGAN RAPAT --}}
                    <div id="section-online-rapat" class="section-online-detail" style="display:none;">
                        <h3>Data Tambahan – Surat Undangan Rapat</h3>
                        <small>Data ini digunakan untuk menyusun surat undangan rapat resmi desa.</small>

                        <div class="form-group mt-2">
                            <label for="judul_rapat">Judul / Nama Rapat</label>
                            <input type="text" name="judul_rapat" id="judul_rapat" class="form-control"
                                   value="{{ old('judul_rapat') }}" placeholder="Contoh: Rapat Musyawarah Desa">
                        </div>
                        <div class="form-group">
                            <label for="agenda_rapat">Agenda Rapat</label>
                            <textarea name="agenda_rapat" id="agenda_rapat" rows="2" class="form-control"
                                      placeholder="Uraikan agenda rapat">{{ old('agenda_rapat') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_rapat">Tanggal Rapat</label>
                            <input type="date" name="tanggal_rapat" id="tanggal_rapat" class="form-control"
                                   value="{{ old('tanggal_rapat') }}">
                        </div>
                        <div class="form-group">
                            <label for="waktu_rapat">Waktu Rapat</label>
                            <input type="text" name="waktu_rapat" id="waktu_rapat" class="form-control"
                                   value="{{ old('waktu_rapat') }}" placeholder="Contoh: 19.00 WIB">
                        </div>
                        <div class="form-group">
                            <label for="tempat_rapat">Tempat Rapat</label>
                            <input type="text" name="tempat_rapat" id="tempat_rapat" class="form-control"
                                   value="{{ old('tempat_rapat') }}" placeholder="Contoh: Balai Desa, Aula, dll.">
                        </div>
                        <div class="form-group">
                            <label for="penerima_undangan">Penerima Undangan</label>
                            <textarea name="penerima_undangan" id="penerima_undangan" rows="2" class="form-control"
                                      placeholder="Contoh: Ketua RT/RW, tokoh masyarakat, warga RT 01, dll.">{{ old('penerima_undangan') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="penanggung_jawab">Penanggung Jawab Rapat</label>
                            <input type="text" name="penanggung_jawab" id="penanggung_jawab" class="form-control"
                                   value="{{ old('penanggung_jawab') }}" placeholder="Contoh: Kepala Desa, Ketua Panitia, dll.">
                        </div>
                    </div>

                </div> {{-- /section-online-wrapper --}}

                {{-- LAMPIRAN DOKUMEN OPSIONAL --}}
                <div id="section-lampiran-wrapper" class="form-group" style="display:none; margin-top:10px;">
                    <label for="lampiran">Lampiran Dokumen Pendukung (opsional)</label>
                    <input type="file" name="lampiran" id="lampiran" class="form-control" accept="image/*,.pdf">
                    <small id="lampiran_hint" class="mode-help">
                        Upload foto / scan dokumen pendukung bila sudah ada.
                    </small>
                </div>

                <button type="submit" class="btn-primary">
                    Ajukan Surat
                </button>
            </form>
        </div>

        {{-- INFO / KONTEN SAMPING --}}
        <div class="card">
            <h2 class="card-title">Informasi Layanan</h2>
            <p class="text-muted">
                • Pengajuan surat akan diproses oleh perangkat desa pada hari kerja.<br>
                • Untuk pengajuan <strong>online lengkap</strong>, pastikan semua data diisi dengan benar.<br>
                • Silakan datang ke kantor desa untuk mengambil dokumen ketika status sudah <strong>disetujui</strong>.<br>
                • Bawa berkas pendukung asli (KTP, KK, dan dokumen lain yang diperlukan sesuai jenis surat).
            </p>
        </div>
    </div>

    {{-- STATUS PENGAJUAN --}}
    <div class="card" style="margin-top: 25px;">
        <h2 class="card-title">Riwayat Pengajuan Surat Anda</h2>

        <div class="table-wrapper">
        <table>
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Surat</th>
            <th>Tanggal Pengajuan</th>
            <th>Estimasi Selesai</th>
            <th>Status</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($surat as $index => $item)
            @php
                $status = $item->status ?? 'menunggu';
                $badgeClass = match ($status) {
                    'disetujui' => 'badge-disetujui',
                    'ditolak'   => 'badge-ditolak',
                    default     => 'badge-menunggu',
                };
            @endphp
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->jenis_surat }}</td>
                <td>{{ $item->created_at?->format('d-m-Y') ?? '-' }}</td>

                {{-- Estimasi selesai --}}
                <td>
                    @if($item->estimasi_selesai)
                        {{ $item->estimasi_selesai->format('d-m-Y H:i') }}
                    @elseif($status === 'disetujui')
                        <span class="text-muted">Belum ditentukan</span>
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>

                <td>
                    <span class="badge {{ $badgeClass }}">
                        {{ ucfirst($status) }}
                    </span>
                </td>
                <td>{{ $item->keterangan ?: '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-muted">
                    Belum ada pengajuan surat. Silakan isi form di atas untuk mengajukan surat pertama Anda.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const radioManual = document.querySelector('input[name="tipe_pengajuan"][value="manual"]');
        const radioOnline = document.querySelector('input[name="tipe_pengajuan"][value="online"]');
        const selectJenis = document.getElementById('jenis_surat');

        const wrapperOnline     = document.getElementById('section-online-wrapper');
        const sectionDomisili   = document.getElementById('section-online-domisili');
        const sectionUsaha      = document.getElementById('section-online-usaha');
        const sectionSKTM       = document.getElementById('section-online-sktm');
        const sectionKTP        = document.getElementById('section-online-ktp');
        const sectionKelahiran  = document.getElementById('section-online-kelahiran');
        const sectionKematian   = document.getElementById('section-online-kematian');
        const sectionKUA        = document.getElementById('section-online-kua');
        const sectionBelumMenikah = document.getElementById('section-online-belum-menikah');
        const sectionTanah      = document.getElementById('section-online-tanah');
        const sectionRapat      = document.getElementById('section-online-rapat');

        const lampiranWrapper   = document.getElementById('section-lampiran-wrapper');
        const lampiranHint      = document.getElementById('lampiran_hint');

        function hideAllSections() {
            sectionDomisili.style.display     = 'none';
            sectionUsaha.style.display        = 'none';
            sectionSKTM.style.display         = 'none';
            sectionKTP.style.display          = 'none';
            sectionKelahiran.style.display    = 'none';
            sectionKematian.style.display     = 'none';
            sectionKUA.style.display          = 'none';
            sectionBelumMenikah.style.display = 'none';
            sectionTanah.style.display        = 'none';
            sectionRapat.style.display        = 'none';
        }

        function updateOnlineSection() {
            const isOnline = radioOnline && radioOnline.checked;
            const jenis = selectJenis ? selectJenis.value : '';

            wrapperOnline.style.display = 'none';
            hideAllSections();

            if (lampiranWrapper) {
                lampiranWrapper.style.display = 'none';
            }

            if (!isOnline || !jenis) {
                return;
            }

            wrapperOnline.style.display = 'block';

            switch (jenis) {
                case 'Surat Domisili':
                    sectionDomisili.style.display = 'block';
                    break;
                case 'Surat Keterangan Usaha':
                    sectionUsaha.style.display = 'block';
                    break;
                case 'Surat Keterangan Tidak Mampu':
                    sectionSKTM.style.display = 'block';
                    break;
                case 'Surat Pengantar KTP':
                    sectionKTP.style.display = 'block';
                    break;
                case 'Surat Kelahiran':
                    sectionKelahiran.style.display = 'block';
                    break;
                case 'Surat Kematian':
                    sectionKematian.style.display = 'block';
                    break;
                case 'Surat Pengantar KUA':
                    sectionKUA.style.display = 'block';
                    break;
                case 'Surat Keterangan Belum Menikah':
                    sectionBelumMenikah.style.display = 'block';
                    break;
                case 'Surat Keterangan Tanah':
                    sectionTanah.style.display = 'block';
                    break;
                case 'Surat Undangan Rapat':
                    sectionRapat.style.display = 'block';
                    break;
            }

            // Tampilkan lampiran untuk jenis tertentu dengan hint sesuai
            if (lampiranWrapper && lampiranHint) {
                let hintText = null;

                switch (jenis) {
                    case 'Surat Pengantar KTP':
                        hintText = 'Disarankan mengunggah surat keterangan hilang dari kepolisian (jika KTP hilang) atau dokumen pendukung lain.';
                        break;
                    case 'Surat Keterangan Tidak Mampu':
                        hintText = 'Bisa mengunggah surat pengantar RT/RW atau surat pernyataan tidak mampu (opsional).';
                        break;
                    case 'Surat Kelahiran':
                        hintText = 'Disarankan mengunggah surat keterangan lahir dari bidan/rumah sakit (opsional).';
                        break;
                    case 'Surat Kematian':
                        hintText = 'Disarankan mengunggah surat keterangan kematian dari dokter/puskesmas (jika ada).';
                        break;
                    case 'Surat Pengantar KUA':
                        hintText = 'Bisa mengunggah fotokopi KTP/KK atau dokumen pendukung lainnya (opsional).';
                        break;
                    case 'Surat Keterangan Tanah':
                        hintText = 'Bisa mengunggah bukti kepemilikan tanah atau bukti pembayaran PBB terakhir (opsional).';
                        break;
                    default:
                        hintText = null;
                }

                if (hintText) {
                    lampiranWrapper.style.display = 'block';
                    lampiranHint.textContent = hintText;
                }
            }
        }

        if (radioManual && radioOnline && selectJenis) {
            radioManual.addEventListener('change', updateOnlineSection);
            radioOnline.addEventListener('change', updateOnlineSection);
            selectJenis.addEventListener('change', updateOnlineSection);

            // panggil sekali di awal untuk handle old() / reload
            updateOnlineSection();
        }
    });
</script>
@endsection
