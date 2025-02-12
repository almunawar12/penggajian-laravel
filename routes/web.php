<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JamMengajarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
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
        Route::get('/edit/{id}', [JamMengajarController::class, 'edit'])->name('jam-mengajar.edit');
        Route::put('/update/{id}', [JamMengajarController::class, 'update'])->name('jam-mengajar.update');
        Route::delete('/destroy/{id}', [JamMengajarController::class, 'destroy'])->name('jam-mengajar.destroy');
    });

    Route::prefix('absen')->group(function () {
        Route::get('/', [AbsenController::class, 'index'])->name('absen.index');
        Route::get('/create', [AbsenController::class, 'create'])->name('absen.create');
        Route::post('/store', [AbsenController::class, 'store'])->name('absen.store');
        Route::get('/edit/{id}', [AbsenController::class, 'edit'])->name('absen.edit');
        Route::put('/update/{id}', [AbsenController::class, 'update'])->name('absen.update');
        Route::delete('/destroy/{id}', [AbsenController::class, 'destroy'])->name('absen.destroy');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });
});

// guru dan admin bisa mengakses halaman ini
Route::middleware(['auth'])->group(function () {
    Route::prefix('gaji')->group(function () {
        Route::get('/', [GajiController::class, 'index'])->name('gaji.index');
        Route::post('/hitung/{guru_id}', [GajiController::class, 'hitung'])->name('gaji.hitung');
        Route::get('/create', [GajiController::class, 'create'])->name('gaji.create');
        Route::post('/store', [GajiController::class, 'store'])->name('gaji.store');
        Route::get('/gaji/print/{id}', [GajiController::class, 'print'])->name('gaji.print');
    });

    Route::prefix('absen')->group(function () {
        Route::get('/', [AbsenController::class, 'index'])->name('absen.index');
        Route::get('/create', [AbsenController::class, 'create'])->name('absen.create');
        Route::post('/store', [AbsenController::class, 'store'])->name('absen.store');
        Route::get('/edit/{id}', [AbsenController::class, 'edit'])->name('absen.edit');
        Route::put('/update/{id}', [AbsenController::class, 'update'])->name('absen.update');
        Route::delete('/destroy/{id}', [AbsenController::class, 'destroy'])->name('absen.destroy');
    });
});

// Route::middleware(['auth', 'role:admin,guru'])->group(function () {
//     Route::prefix('absen')->group(function () {
//         Route::get('/', [AbsenController::class, 'index'])->name('absen.index'); // Bisa diakses oleh guru dan admin
//         Route::get('/create', [AbsenController::class, 'create'])->name('absen.create')->middleware('role:admin');
//         Route::post('/store', [AbsenController::class, 'store'])->name('absen.store')->middleware('role:admin');
//         Route::get('/edit/{id}', [AbsenController::class, 'edit'])->name('absen.edit')->middleware('role:admin');
//         Route::put('/update/{id}', [AbsenController::class, 'update'])->name('absen.update')->middleware('role:admin');
//         Route::delete('/destroy/{id}', [AbsenController::class, 'destroy'])->name('absen.destroy')->middleware('role:admin');
//     });
// });
