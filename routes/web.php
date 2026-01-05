<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SanksiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/manager/dashboard', [AdminController::class, 'managerDashboard'])->name('manager.dashboard');
    Route::get('/user/dashboard', [AdminController::class, 'userDashboard'])->name('user.dashboard');
    
    // Data Alat routes
    Route::get('/admin/alat', [AlatController::class, 'index'])->name('admin.alat.index');
    Route::get('/admin/alat/create', [AlatController::class, 'create'])->name('admin.alat.create');
    Route::post('/admin/alat', [AlatController::class, 'store'])->name('admin.alat.store');
    Route::get('/admin/alat/{alat}', [AlatController::class, 'show'])->name('admin.alat.show');
    Route::get('/admin/alat/{alat}/edit', [AlatController::class, 'edit'])->name('admin.alat.edit');
    Route::put('/admin/alat/{alat}', [AlatController::class, 'update'])->name('admin.alat.update');
    Route::delete('/admin/alat/{alat}', [AlatController::class, 'destroy'])->name('admin.alat.destroy');
    
    // Data Dosen routes
    Route::get('/admin/dosen', [DosenController::class, 'index'])->name('admin.dosen.index');
    Route::get('/admin/dosen/create', [DosenController::class, 'create'])->name('admin.dosen.create');
    Route::post('/admin/dosen', [DosenController::class, 'store'])->name('admin.dosen.store');
    Route::get('/admin/dosen/{dosen}', [DosenController::class, 'show'])->name('admin.dosen.show');
    Route::get('/admin/dosen/{dosen}/edit', [DosenController::class, 'edit'])->name('admin.dosen.edit');
    Route::put('/admin/dosen/{dosen}', [DosenController::class, 'update'])->name('admin.dosen.update');
    Route::delete('/admin/dosen/{dosen}', [DosenController::class, 'destroy'])->name('admin.dosen.destroy');
    
    // Data Mahasiswa routes
    Route::get('/admin/mahasiswa', [MahasiswaController::class, 'index'])->name('admin.mahasiswa.index');
    Route::get('/admin/mahasiswa/create', [MahasiswaController::class, 'create'])->name('admin.mahasiswa.create');
    Route::post('/admin/mahasiswa', [MahasiswaController::class, 'store'])->name('admin.mahasiswa.store');
    Route::get('/admin/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'show'])->name('admin.mahasiswa.show');
    Route::get('/admin/mahasiswa/{mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('admin.mahasiswa.edit');
    Route::put('/admin/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update'])->name('admin.mahasiswa.update');
    Route::delete('/admin/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('admin.mahasiswa.destroy');
    
    // Data Sanksi routes
    Route::get('/admin/sanksi', [SanksiController::class, 'index'])->name('admin.sanksi.index');
    Route::get('/admin/sanksi/create', [SanksiController::class, 'create'])->name('admin.sanksi.create');
    Route::post('/admin/sanksi', [SanksiController::class, 'store'])->name('admin.sanksi.store');
    Route::get('/admin/sanksi/{sanksi}', [SanksiController::class, 'show'])->name('admin.sanksi.show');
    Route::get('/admin/sanksi/{sanksi}/edit', [SanksiController::class, 'edit'])->name('admin.sanksi.edit');
    Route::put('/admin/sanksi/{sanksi}', [SanksiController::class, 'update'])->name('admin.sanksi.update');
    Route::delete('/admin/sanksi/{sanksi}', [SanksiController::class, 'destroy'])->name('admin.sanksi.destroy');
    
    // Data Peminjaman routes
    Route::get('/admin/peminjaman', [PeminjamanController::class, 'index'])->name('admin.peminjaman.index');
    Route::get('/admin/peminjaman/create', [PeminjamanController::class, 'create'])->name('admin.peminjaman.create');
    Route::post('/admin/peminjaman', [PeminjamanController::class, 'store'])->name('admin.peminjaman.store');
    Route::get('/admin/peminjaman/{peminjaman}', [PeminjamanController::class, 'show'])->name('admin.peminjaman.show');
    Route::get('/admin/peminjaman/{peminjaman}/edit', [PeminjamanController::class, 'edit'])->name('admin.peminjaman.edit');
    Route::put('/admin/peminjaman/{peminjaman}', [PeminjamanController::class, 'update'])->name('admin.peminjaman.update');
    Route::delete('/admin/peminjaman/{peminjaman}', [PeminjamanController::class, 'destroy'])->name('admin.peminjaman.destroy');
    
    // Data Pengembalian routes
    Route::get('/admin/pengembalian', [PengembalianController::class, 'index'])->name('admin.pengembalian.index');
    Route::get('/admin/pengembalian/create', [PengembalianController::class, 'create'])->name('admin.pengembalian.create');
    Route::post('/admin/pengembalian', [PengembalianController::class, 'store'])->name('admin.pengembalian.store');
    Route::get('/admin/pengembalian/{pengembalian}', [PengembalianController::class, 'show'])->name('admin.pengembalian.show');
    Route::get('/admin/pengembalian/{pengembalian}/edit', [PengembalianController::class, 'edit'])->name('admin.pengembalian.edit');
    Route::put('/admin/pengembalian/{pengembalian}', [PengembalianController::class, 'update'])->name('admin.pengembalian.update');
    Route::delete('/admin/pengembalian/{pengembalian}', [PengembalianController::class, 'destroy'])->name('admin.pengembalian.destroy');
    
    // Laporan routes
    Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan.index');
    Route::get('/admin/laporan/peminjaman', [LaporanController::class, 'peminjaman'])->name('admin.laporan.peminjaman');
    Route::get('/admin/laporan/pengembalian', [LaporanController::class, 'pengembalian'])->name('admin.laporan.pengembalian');
    Route::get('/admin/laporan/alat', [LaporanController::class, 'alat'])->name('admin.laporan.alat');
    Route::get('/admin/laporan/sanksi', [LaporanController::class, 'sanksi'])->name('admin.laporan.sanksi');
});
