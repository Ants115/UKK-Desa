<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\FacadesAuth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\InventarisController;

// --------------------------
// BERANDA
// --------------------------
Route::get('/', function () {
    return view('beranda');
})->name('home');

// --------------------------
// LOGIN & REGISTER
// --------------------------
Route::get('/login', fn () => view('auth.login'))->name('login');

Route::get('/login/user', [AuthController::class, 'showLoginForm'])->name('login.user');
Route::post('/login/user', [AuthController::class, 'login'])->name('login.user.post');

Route::get('/login/admin', [AdminAuthController::class, 'loginForm'])->name('login.admin');
Route::post('/login/admin', [AdminAuthController::class, 'login'])->name('login.admin.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// --------------------------
// WARGA
// --------------------------
Route::middleware(['auth', 'role:warga'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard', ['user' => Auth::user()]);
    })->name('dashboard');

    // Surat untuk warga
    Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');
    Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');

    // Inventaris (WARGA HANYA BISA LIHAT)
    Route::get('/inventaris', [InventarisController::class, 'publicIndex'])
        ->name('inventaris.public');
});

// --------------------------
// ADMIN
// --------------------------
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin', ['admin' => Auth::user()]);
    })->name('admin.dashboard');

    // Surat untuk admin
    Route::get('/admin/surat', [SuratController::class, 'adminIndex'])->name('admin.surat');

    // DETAIL SURAT + KEPUTUSAN
    Route::get('/admin/surat/{id}', [SuratController::class, 'show'])->name('admin.surat.show');
    Route::post('/admin/surat/{id}/keputusan', [SuratController::class, 'updateStatus'])->name('admin.surat.keputusan');

    // opsi cepat (kalau masih dipakai)
    Route::post('/admin/surat/{id}/setujui', [SuratController::class, 'setujui'])->name('admin.surat.setujui');
    Route::post('/admin/surat/{id}/tolak',   [SuratController::class, 'tolak'])->name('admin.surat.tolak');

    // MANAJEMEN INVENTARIS — CRUD khusus admin
    Route::get('/admin/inventaris', [InventarisController::class, 'index'])->name('inventaris.index');
    Route::get('/admin/inventaris/create', [InventarisController::class, 'create'])->name('inventaris.create');
    Route::post('/admin/inventaris', [InventarisController::class, 'store'])->name('inventaris.store');
    Route::get('/admin/inventaris/{id}', [InventarisController::class, 'show'])->name('inventaris.show');

    Route::get('/admin/inventaris/{id}/edit', [InventarisController::class, 'edit'])->name('inventaris.edit');
    Route::put('/admin/inventaris/{id}', [InventarisController::class, 'update'])->name('inventaris.update');

    Route::delete('/admin/inventaris/{id}', [InventarisController::class, 'destroy'])->name('inventaris.destroy');
});

// --------------------------
// LAYANAN PUBLIK
// --------------------------

// Surat
Route::get('/layanan/surat-menyurat', function () {
    return redirect()->route('surat.index');
})->middleware('auth')->name('layanan.surat');

// Inventaris
Route::get('/layanan/inventaris', function () {

    if (Auth::user()->role === 'admin') {
        // admin ke halaman CRUD
        return redirect()->route('inventaris.index');
    }

    // warga ke halaman lihat saja
    return redirect()->route('inventaris.public');

})->middleware('auth')->name('layanan.inventaris');

// --------------------------
// LOGOUT
// --------------------------
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
