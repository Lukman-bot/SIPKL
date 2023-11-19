<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenggunaController;

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

    Route::group(['prefix' => 'pengguna'], function () {
        Route::get('', [PenggunaController::class, 'index']);
        Route::post('/listData', [PenggunaController::class, 'listData'])->name('pengguna.listData');
        Route::get('/form', [PenggunaController::class, 'form']);
        Route::get('/form/{id}', [PenggunaController::class, 'form']);
        Route::post('', [PenggunaController::class, 'store']);
        Route::post('/delete', [PenggunaController::class, 'destroy']);
    });
});
