# 🏡 Aplikasi SID (Sistem Informasi Desa) – UKK 2526

> **Progress Terakhir:** Setup awal

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
<img src="https://img.shields.io/badge/Laravel-12.x-red" alt="Laravel Version">
<img src="https://img.shields.io/badge/Status-Development-orange" alt="Status">
</p>

---

## 📌 Tentang Proyek

Aplikasi **SID (Sistem Informasi Desa)** adalah aplikasi web yang membantu pemerintah desa mengelola data kependudukan, pelayanan surat, publikasi informasi pembangunan, dan pembuatan laporan secara digital.

### 🎯 Tujuan Utama

-   **Efisiensi:** Mempercepat proses administrasi desa (mengurangi kertas).
-   **Transparansi:** Masyarakat bisa mengakses informasi desa.
-   **Kemudahan Akses:** Warga bisa mengajukan surat & cek informasi secara online.
-   **Data Terintegrasi:** Data desa dapat dipakai untuk laporan dan perencanaan.

### 👥 Pengguna Utama

-   **Operator Desa / Admin** — memasukkan & memverifikasi data.
-   **Kepala Desa** — melihat laporan & tanda tangan surat.
-   **Masyarakat** — mengajukan permohonan surat dan melihat info desa.
-   **Pemerintah Kabupaten/Provinsi** — menerima data terintegrasi (opsional).

### 🕒 Waktu Penggunaan

-   Digunakan **sehari-hari** untuk update data & pelayanan.
-   Saat penyusunan **laporan bulanan/tahunan** (APBDes, realisasi).
-   Saat warga butuh **surat keterangan** atau informasi.

### 🔑 Fitur Utama

-   Manajemen data penduduk (KK, KTP, kelahiran, kematian).
-   Layanan permohonan & cetak surat (PDF).
-   Publikasi informasi pembangunan dan APBDes.
-   Dashboard statistik sederhana.
-   **(Opsional)** Sinkron / integrasi API ke sistem kabupaten/provinsi.

---

## 🔄 Alur & Integrasi (singkat)

1. Operator input → validasi → simpan ke DB.
2. Data valid → bisa dipublikasikan di portal / dipakai cetak surat.
3. Untuk integrasi, buat endpoint API sederhana (contoh: `POST /api/sync/kependudukan`) untuk sinkron ke server kabupaten — atau gunakan **mock API** saat latihan UKK.

Contoh endpoint simulasi untuk latihan:

-   `GET  /api/desa/info` — ambil ringkasan data desa
-   `POST /api/desa/kependudukan` — kirim data penduduk ke pusat (sinkron)
-   `GET  /api/desa/laporan/apbdes` — ambil laporan ringkas

---

## 🔄 Cara Clone Branch Ini

Gunakan perintah berikut untuk clone hanya branch ini saja:

```bash
git clone --branch aplikasi_sid --single-branch https://github.com/riskiputraalamzah/ukk_2526.git aplikasi_sid
```

Lalu masuk ke folder project:

```bash
cd aplikasi_sid
```

---

## 🚀 Cara Menjalankan Aplikasi

Pastikan environment Laravel sudah siap (PHP, Composer, dan database server). Lalu jalankan:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Aplikasi akan berjalan di: `http://127.0.0.1:8000`

---

## 💡 Rekomendasi untuk kalian yang kedapetan UKK SID

Buat mock API untuk latihan sinkronisasi (cukup endpoint sederhana).

Tampilkan dashboard: grafik jumlah penduduk, grafik anggaran APBDes (pakai Chart.js atau library sederhana).

Modul cetak surat: gunakan library PDF (dompdf atau laravel-dompdf) agar bisa langsung generate PDF.

## 💬 Penutup

Semangat untuk teman-teman kelas 12 RPL yang sedang mengerjakan **UKK 2526**! 💪
Kerjakan dengan teliti, update bagian _Progress Terakhir_ di README ini setiap ada fitur baru, dan jaga kerapihan kode agar mudah dipresentasikan dan dinilai dengan baik. 🚀
