<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LaporBanjirController;

// Publik (Warga kirim laporan tanpa login)
Route::get('/', [LaporBanjirController::class, 'create'])->name('laporan.create');
Route::post('/laporan', [LaporBanjirController::class, 'store'])->name('laporan.store');

// Guest (Hanya untuk yang belum login)
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Protected (Hanya untuk Petugas yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/daftar-laporan', [LaporBanjirController::class, 'index'])->name('laporan.index');
    Route::get('/profil-petugas', fn() => view('auth.profil'))->name('profil');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});