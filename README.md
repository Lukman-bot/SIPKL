# SIPKL (Sistem Informasi Praktek Kerja Lapangan)

## Overview Aplikasi

Aplikasi ini merupakan <i>Web Based Application</i>. Aplikasi ini di bangun menggunakan <b>Framework</b> <a href="https://laravel.com/docs/10.x/releases" target="_blank">Laravel</a> versi 10.

Aplikasi ini dibangun bertujuan untuk membuat sistem yang akan mengelola data <i>Praktek Kerja Lapangan</i> dari siswa yang bersekolah di <b>SMK Daarul Abroor</b>.

## Tutorial Penginstalan Aplikasi

Ada beberapa hal yang harus dipersiapkan untuk menjalankan aplikasi ini. Beberapa aplikasi lain yang sudah harus Anda siapkan di antaranya adalah:
* <a href="https://www.apachefriends.org/" target="_blank">Xampp</a> dengan versi php >8.2
* <a href="https://getcomposer.org/" target="_blank">Composer</a>

Untuk tata cara penginstalan aplikasi, silahkan Anda ikuti langkah berikut untuk menjalankan aplikasi ini pada perangkat Anda.

Langkah pertama, silahkan download atau clone source ini pada perangkat Anda.

Selanjutnya, extract source code ini pada folder:

```console
C:\xampp\htdocs
```

Setelah selesai mengextract, silahkan buka folder source code-nya pada Visual Studio Code.
Selanjutnya, silahkan buka terminal Visual Studio Code, kemudian jalankan perintah berikut.

```console
composer update
```

Jika sudah selesai, maka lanjut ke perintah berikut.

```console
cp .env.example .env
```

Selanjutnya, silahkan generate kunci aplikasi laravel menggunakan perintah berikut.

```console
php artisan key:generate
```

Selanjutnya, silahkan buka file .env, kemudian cari bagian konfigurasi database. Ubah konfigurasinya menjadi seperti berikut.

```console
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_sip_pkl
DB_USERNAME=root
DB_PASSWORD=
```

Setelah membuat konfigurasi database pada file .env, selanjutnya silahkan jalankan migrasi database, atau ikuti perintah berikut.

```console
php artisan migrate
```

Setelah itu, silahkan running aplikasinya menggunakan perintah berikut.

```console
php artisan serve
```


## Script Routes web.php
```console
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DudiController;
use App\Http\Controllers\DaftarHadirController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\GambarKerjaController;
use App\Http\Controllers\KonsultasiPembimbingDudiController;
use App\Http\Controllers\KonsultasiPembimbingGuruController;
use App\Http\Controllers\PenilaianController;

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

    Route::get('daftar-hadir', [DaftarHadirController::class, 'index']);
    Route::get('/daftar-hadir/form', [DaftarHadirController::class, 'form']);
    Route::get('/daftar-hadir/form/{id}', [DaftarHadirController::class, 'form']);
    Route::post('/daftar-hadir', [DaftarHadirController::class, 'store']);
    Route::get('/daftar-hadir/delete/{id}', [DaftarHadirController::class, 'destroy']);

    Route::get('monitoring', [MonitoringController::class, 'index']);

    Route::get('agenda', [AgendaController::class, 'index']);

    Route::get('gambar-kerja', [GambarKerjaController::class, 'index']);

    Route::get('konsultasi-pembimbing-dudi', [KonsultasiPembimbingDudiController::class, 'index']);

    Route::get('konsultasi-pembimbing-guru', [KonsultasiPembimbingGuruController::class, 'index']);

    Route::get('penilaian', [PenilaianController::class, 'index']);
});
```
