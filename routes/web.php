<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sodaqoh', function () {
    return view('sodaqoh');
});




Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/data-absensi-bulanan', [DashboardController::class, 'statistik'])
    ->middleware(['auth', 'verified'])
    ->name('member.statistik');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/my-qr', function () {
    return view('dashboard'); // File ini yang isinya kartu QR kamu
})->middleware(['auth', 'verified'])->name('member.qr');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

use App\Http\Controllers\AdminController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/scan', [AdminController::class, 'scan'])->name('admin.scan');
    
    // Jalur POST untuk scan Hadir (bawaan projectmu)
    Route::post('/admin/absen', [AdminController::class, 'prosesAbsen'])->name('admin.absen');
    
    // 🔥 TAMBAHKAN INI: Jalur POST baru untuk scan Izin
    Route::post('/admin/izin', [AdminController::class, 'prosesIzin'])->name('admin.izin');
    
    Route::get('/admin/get-latest-absen', [AdminController::class, 'getLatestAttendances']);
});
