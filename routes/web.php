<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangTemuanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanHilangController;
use App\Http\Controllers\SecurityController;

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

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Barang klaim
    Route::post('/barang/{id}/klaim', [BarangTemuanController::class, 'klaim'])
        ->name('barang.klaim');

    // Laporan hilang
    Route::get('/laporan/buat', [LaporanHilangController::class, 'create'])
        ->name('laporan.create');
    Route::post('/laporan', [LaporanHilangController::class, 'store'])
        ->name('laporan.store');
    Route::get('/laporan/{id}', [LaporanHilangController::class, 'show'])
        ->name('laporan.show');

    // Profile — pakai path berbeda agar tidak bentrok dengan auth.php Breeze
    Route::get('/profil-saya', [ProfileController::class, 'index'])
        ->name('profile.index');
    Route::patch('/profil-saya', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profil-saya', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Security
    Route::prefix('security')->name('security.')->group(function () {
        Route::get('/dashboard', [SecurityController::class, 'index'])
            ->name('dashboard');
        Route::post('/barang', [SecurityController::class, 'storeBarang'])
            ->name('barang.store');
        Route::post('/klaim/{id}/setujui', [SecurityController::class, 'setujuiKlaim'])
            ->name('klaim.setujui');
        Route::post('/klaim/{id}/tolak', [SecurityController::class, 'tolakKlaim'])
            ->name('klaim.tolak');
    });

});

require __DIR__.'/auth.php';