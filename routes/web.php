<?php

use App\Http\Controllers\SeleksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SeleksiController::class, 'index'])->name('home');
Route::post('/cari-hasil', [SeleksiController::class, 'cariHasil'])->name('cari.hasil');
Route::get('/hasil/{id}', [SeleksiController::class, 'showHasil'])->name('hasil.show');
Route::get('/download-hasil/{id}', [SeleksiController::class, 'downloadHasil'])->name('download.hasil');
Route::get('/leaderboard', [SeleksiController::class, 'leaderboard'])->name('leaderboard');
Route::get('/gallery', [SeleksiController::class, 'gallery'])->name('gallery');
Route::get('/dokumentasi', [SeleksiController::class, 'dokumentasi'])->name('dokumentasi');

Route::get('/admin-panel', [SeleksiController::class, 'adminPanel'])->name('admin.panel');
Route::post('/peserta', [SeleksiController::class, 'store'])->name('peserta.store');
Route::get('/peserta/{id}/edit', [SeleksiController::class, 'edit'])->name('peserta.edit');
Route::put('/peserta/{id}', [SeleksiController::class, 'update'])->name('peserta.update');
Route::delete('/peserta/{id}', [SeleksiController::class, 'destroy'])->name('peserta.destroy');
Route::get('/dashboard', [SeleksiController::class, 'index'])->name('dashboard');