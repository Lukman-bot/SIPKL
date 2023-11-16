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


## script Controller DashboardController
```console
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        switch (session()->get('id_jenis_pengguna')) {
            case 1:
                $penempatan = '';
                $mitra = '';
                $pembimbing = '';
                $pembimbingGuru = '';
                $siswa = '';
                break;

            case 2:
                $penempatan = DB::table('penempatan')->leftJoin('pengguna', 'pengguna.id_pengguna', '=', 'penempatan.id_pengguna')->where('penempatan.id_pengguna', session()->get('id_pengguna'))->first();

                if ($penempatan) {
                    $mitra = DB::table('dudi')->where('id_dudi', $penempatan->id_mitra)->first();
                    $pembimbing = DB::table('pembimbing_dudi')->leftJoin('pengguna', 'pengguna.id_pengguna', '=','pembimbing_dudi.id_pengguna')->where('pembimbing_dudi.id_dudi', $mitra->id_dudi)->first();
                    $pembimbingGuru = DB::table('pembimbing_guru')->leftJoin('pengguna', 'pengguna.id_pengguna', '=','pembimbing_guru.id_pengguna')->where('pembimbing_guru.id_dudi', $mitra->id_dudi)->first();
                    $siswa = '';
                } else {
                    $mitra = '';
                    $pembimbing = '';
                    $pembimbingGuru = '';
                    $siswa = '';
                }
                break;
            
            case 3:
                $pembimbing = DB::table('pembimbing_dudi')->leftJoin('pengguna', 'pengguna.id_pengguna', '=','pembimbing_dudi.id_pengguna')->where('pembimbing_dudi.id_pengguna', session()->get('id_pengguna'))->first();

                if ($pembimbing) {
                    $mitra = DB::table('dudi')->where('id_dudi', $pembimbing->id_dudi)->first();
                    $pembimbingGuru = DB::table('pembimbing_guru')->leftJoin('pengguna', 'pengguna.id_pengguna', '=','pembimbing_guru.id_pengguna')->where('pembimbing_guru.id_dudi', $pembimbing->id_dudi)->first();
                    $penempatan = DB::table('penempatan')->leftJoin('pengguna', 'pengguna.id_pengguna', '=', 'penempatan.id_pengguna')->where('penempatan.id_mitra', $pembimbing->id_dudi)->first();
                    $siswa = DB::table('penempatan')->where('penempatan.id_mitra', $pembimbing->id_dudi)->leftJoin('pengguna', 'pengguna.id_pengguna', '=', 'penempatan.id_pengguna')->get();
                } else {
                    $mitra = '';
                    $pembimbingGuru = '';
                    $penempatan = '';
                    $siswa = '';
                }
                break;

            case 4:
                $pembimbingGuru = DB::table('pembimbing_guru')->leftJoin('pengguna', 'pengguna.id_pengguna', '=','pembimbing_guru.id_pengguna')->where('pembimbing_guru.id_pengguna', session()->get('id_pengguna'))->first();

                if ($pembimbingGuru) {
                    $mitra = DB::table('dudi')->where('id_dudi', $pembimbingGuru->id_dudi)->first();
                    $pembimbing = DB::table('pembimbing_dudi')->leftJoin('pengguna', 'pengguna.id_pengguna', '=','pembimbing_dudi.id_pengguna')->where('pembimbing_dudi.id_dudi', $pembimbingGuru->id_dudi)->first();
                    $penempatan = DB::table('penempatan')->leftJoin('pengguna', 'pengguna.id_pengguna', '=', 'penempatan.id_pengguna')->where('penempatan.id_mitra', $pembimbingGuru->id_dudi)->first();
                    $siswa = DB::table('penempatan')->where('penempatan.id_mitra', $pembimbingGuru->id_dudi)->leftJoin('pengguna', 'pengguna.id_pengguna', '=', 'penempatan.id_pengguna')->get();
                } else {
                    $penempatan = '';
                    $mitra = '';
                    $pembimbing = '';
                    $siswa = '';
                }
                break;
            default:
                $penempatan = '';
                $mitra = '';
                $pembimbing = '';
                $pembimbingGuru = '';
                $siswa = '';
                break;
        }

        $data['id_pengguna'] = session()->get('id_pengguna');
        $data['penempatan'] = $penempatan;
        $data['mitra'] = $mitra;
        $data['pembimbing'] = $pembimbing;
        $data['pembimbingGuru'] = $pembimbingGuru;
        $data['siswa'] = $siswa;
        
        return view('dashboard.index', $data);
    }
}
```

## SCript Dashboard.blade.php
```console
@extends('template/template')
@section('views')
@if (session()->get('id_jenis_pengguna') != 1)
    @if ($mitra != '' || $penempatan != '')
    <div class="card">
        <div class="card-body">
            <dl class="row">
                <dt class="col-lg-2">Nama DU/DI</dt>
                <dd class="col-lg-10">: {{$mitra->nama_dudi}}</dd>
                <dt class="col-lg-2">Nama Pimpinan</dt>
                <dd class="col-lg-10">: {{$mitra->nama_pimpinan}}</dd>
                <dt class="col-lg-2">Alamat</dt>
                <dd class="col-lg-10">: {{$mitra->alamat}}</dd>
                <dt class="col-lg-2">No. Telp</dt>
                <dd class="col-lg-10">: {{$mitra->no_telp}}</dd>
                <dt class="col-lg-2">Email</dt>
                <dd class="col-lg-10">: {{$mitra->email}}</dd>
                <dt class="col-lg-2">Website</dt>
                <dd class="col-lg-10">: {{$mitra->website}}</dd>
            </dl>

            <div class="card">
                <div class="card-header">
                    Informasi Pembimbing DU/DI
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 3%;">No</th>
                                    <th>Nama Pembimbing</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($pembimbing)
                                    <tr>
                                        <td>1</td>
                                        <td>{{$pembimbing->nama_lengkap}}</td>
                                        <td>{{$pembimbing->alamat}}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="4" style="text-align: center;">
                                            <strong>Data Tidak Ada</strong>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Informasi Pembimbing Guru
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 3%;">No</th>
                                    <th>Nama Pembimbing</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($pembimbingGuru)
                                    <tr>
                                        <td>1</td>
                                        <td>{{$pembimbingGuru->nama_lengkap}}</td>
                                        <td>{{$pembimbingGuru->alamat}}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="4" style="text-align: center;">
                                            <strong>Data Tidak Ada</strong>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if (session()->get('id_jenis_pengguna') != 1 && session()->get('id_jenis_pengguna') != 2)
            <div class="card">
                <div class="card-header">
                    List Siswa
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 3%;">No</th>
                                    <th>Nama Siswa</th>
                                    <th>Alamat</th>
                                    <th>Tgl. Mulai Pkl</th>
                                    <th>Tgl. Selesai Pkl</th>
                                    <th>Nilai Angka</th>
                                    <th>Nilai Mutu</th>
                                    @if (session()->get('id_jenis_pengguna') == 1 ||
                                    session()->get('id_jenis_pengguna') == 3)
                                    <th style="width: 5%;">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $show)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$show->nama_lengkap}}</td>
                                        <td>{{$show->alamat}}</td>
                                        <td>{{$show->tgl_mulai_pkl}}</td>
                                        <td>{{$show->tgl_selesai_pkl}}</td>
                                        <td>{{$show->nilai_angka}}</td>
                                        <td>{{$show->nilai_mutu}}</td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <a href="{{url("dudi/form-nilai/" . base64_encode($mitra->id_dudi) . '/' . base64_encode($show->id_penempatan))}}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endif
@endif
@endsection
```
