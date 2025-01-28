<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JamMengajarController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// route untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('guru')->group(function () {
    Route::get('/', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/create', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/store', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
    Route::put('/update/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/destroy/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
});

Route::prefix('jam-mengajar')->group(function () {
    Route::get('/', [JamMengajarController::class, 'index'])->name('jam-mengajar.index');
    Route::get('/create', [JamMengajarController::class, 'create'])->name('jam-mengajar.create');
    Route::post('/store', [JamMengajarController::class, 'store'])->name('jam-mengajar.store');
    Route::get('/edit/{id}', [JamMengajarController::class, 'edit'])->name('jam-mengajar.edit');  // Menambahkan edit route
    Route::put('/update/{id}', [JamMengajarController::class, 'update'])->name('jam-mengajar.update');  // Menambahkan update route
    Route::delete('/destroy/{id}', [JamMengajarController::class, 'destroy'])->name('jam-mengajar.destroy');  // Menambahkan destroy route
});


Route::prefix('absen')->group(function () {
    Route::get('/', [AbsenController::class, 'index'])->name('absen.index');
    Route::get('/create', [AbsenController::class, 'create'])->name('absen.create');
    Route::post('/store', [AbsenController::class, 'store'])->name('absen.store');
    Route::get('/edit/{id}', [AbsenController::class, 'edit'])->name('absen.edit');
    Route::put('/update/{id}', [AbsenController::class, 'update'])->name('absen.update');
    Route::delete('/destroy/{id}', [AbsenController::class, 'destroy'])->name('absen.destroy');
});

Route::prefix('gaji')->group(function () {
    Route::get('/', [GajiController::class, 'index'])->name('gaji.index');
    Route::post('/hitung/{guru_id}', [GajiController::class, 'hitung'])->name('gaji.hitung');
    Route::get('/create', [GajiController::class, 'create'])->name('gaji.create');
    Route::post('/store', [GajiController::class, 'store'])->name('gaji.store');
    Route::get('/gaji/print/{id}', [GajiController::class, 'print'])->name('gaji.print');
    // Route::delete('/destroy/{id}', [GajiController::class, 'destroy'])->name('gaji.destroy');
});
