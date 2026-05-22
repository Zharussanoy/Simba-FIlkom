<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangTemuanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanHilangController;

Route::get('/', function () {
    return view('pages.landing');
})->name('home');

/*
| PUBLIC BARANG
*/
Route::get('/barang', [BarangTemuanController::class, 'index'])
    ->name('barang.public');

Route::get('/barang/{id}', [BarangTemuanController::class, 'show'])
    ->name('barang.show');

/*
| AUTH
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/barang/{id}/klaim', [BarangTemuanController::class, 'klaim'])
        ->name('barang.klaim');

    Route::get('/laporan/buat', [LaporanHilangController::class, 'create'])
        ->name('laporan.create');

    Route::post('/laporan', [LaporanHilangController::class, 'store'])
        ->name('laporan.store');

    Route::get('/laporan/{id}', [LaporanHilangController::class, 'show'])
        ->name('laporan.show');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';