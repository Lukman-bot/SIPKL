<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DudiController;

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

    Route::get('/products', [ProductController::class, 'index']);

    Route::get('/tasks', 'App\Http\Controllers\TaskController@index');
    Route::post('/tasks', 'App\Http\Controllers\TaskController@store');
    
    Route::get('/sekolah', [SekolahController::class, 'index']);
    Route::get('/sekolah/form', [SekolahController::class, 'form']);
    Route::get('/sekolah/form/{id}', [SekolahController::class, 'form']);
    Route::post('/sekolah', [SekolahController::class, 'store']);
    Route::get('/sekolah/delete/{id}', [SekolahController::class, 'destroy']);

    Route::get('/pengguna', [PenggunaController::class, 'index']);
    Route::get('/pengguna/form', [PenggunaController::class, 'form']);
    Route::get('/pengguna/form/{id}', [PenggunaController::class, 'form']);
    Route::post('/pengguna', [PenggunaController::class, 'store']);
    Route::get('/pengguna/delete/{id}', [PenggunaController::class, 'destroy']);

    Route::get('/dudi', [DudiController::class, 'index']);
    Route::get('/dudi/form', [DudiController::class, 'form']);
    Route::get('/dudi/form/{id}', [DudiController::class, 'form']);
    Route::post('/dudi', [DudiController::class, 'store']);
    Route::get('/dudi/delete/{id}', [DudiController::class, 'destroy']);
    Route::get('/dudi/detail/{id}', [DudiController::class, 'detail']);
    Route::get('/dudi/form-siswa/{id}', [DudiController::class, 'formSiswa']);
    Route::get('/dudi/form-siswa/{id}/{id_penempatan}', [DudiController::class, 'formSiswa']);
    Route::post('/save-siswa', [DudiController::class, 'saveSiswa']);
    Route::get('/dudi/delete-siswa/{id}/{id_penempatan}', [DudiController::class, 'destroySiswa']);
    Route::get('/dudi/form-pembimbing/{id}', [DudiController::class, 'formPembimbing']);
    Route::get('/dudi/form-pembimbing/{id}/{id_pembimbing_dudi}', [DudiController::class, 'formPembimbing']);
    Route::post('/save-pembimbing', [DudiController::class, 'savePembimbing']);
    Route::get('/dudi/delete-pembimbing/{id}/{id_pembimbing_dudi}', [DudiController::class, 'destroyPembimbing']);
});
