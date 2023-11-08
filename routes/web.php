<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SekolahController;


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
    return view('login');
});

Route::get('/product', [ProductController::class, 'index']);

Route::get('/tasks', 'App\Http\Controllers\TaskController@index');
Route::post('/tasks', 'App\Http\Controllers\TaskController@store');

Route::get('/sekolah', [SekolahController::class, 'index']);
Route::get('/sekolah/form', [SekolahController::class, 'form']);
Route::get('/sekolah/form/{id}', [SekolahController::class, 'form']);
Route::post('/sekolah', [SekolahController::class, 'store']);
Route::get('/sekolah/delete/{id}', [SekolahController::class, 'destroy']);