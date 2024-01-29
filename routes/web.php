<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SiswaController;

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

Route::get('/', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Routes Pengguna
    Route::group(['prefix' => 'pengguna'], function () {
        Route::get('', [PenggunaController::class, 'index']);
        Route::post('/listData', [PenggunaController::class, 'listData'])->name('pengguna.listData');
        Route::get('/form', [PenggunaController::class, 'form']);
        Route::get('/form/{id}', [PenggunaController::class, 'form']);
        Route::post('', [PenggunaController::class, 'store']);
        Route::post('/delete', [PenggunaController::class, 'destroy']);
    });

    // Routes Siswa
    Route::group(['prefix' => 'siswa'], function () {
        Route::get('', [SiswaController::class, 'index']);
        Route::post('/listData', [SiswaController::class, 'listData'])->name('siswa.listData');
        Route::get('/form', [SiswaController::class, 'form']);
        Route::get('/form/{id}', [SiswaController::class, 'form']);
        Route::post('', [SiswaController::class, 'store']);
        Route::post('/delete', [SiswaController::class, 'destroy']);
    });
});
