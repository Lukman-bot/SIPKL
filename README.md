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


## Script View Daftar Hadir
```console
@extends('template/template')
@section('views')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" ariahidden="true">&times;</button>
    {{ session('success') }}
</div>
@elseif (session()->has('error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" ariahidden="true">&times;</button>
    {{ session('error') }}
</div>
@endif
<div class="card">
    <div class="card-header">
        <div class="float-right">
            <a class="btn btn-success" href="{{url("daftar-hadir/form")}}">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Tgl. Hadir</th>
                        <th>Jam Datang</th>
                        <th>Jam Pulang</th>
                        <th>Keterangan</th>
                        <th style="width: 5%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $show)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$show->tgl_kehadiran}}</td>
                            <td>{{$show->jam_datang}}</td>
                            <td>{{$show->jam_pulang}}</td>
                            <td>{{$show->keterangan}}</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{url("daftar-hadir/form/" . base64_encode($show->id_daftar_hadir))}}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{url("daftar-hadir/delete/" . base64_encode($show->id_daftar_hadir))}}" class="btn btn-danger btn-sm ml-2">
                                        <i class="fa fa-trash"></i>
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
@endsection
```

## Script Controller DaftarHadir
```console
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DaftarHadir;

class DaftarHadirController extends Controller
{
    public function __construct()
    {
        $this->model = new DaftarHadir();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Hadir',
            'data' => DaftarHadir::all()
        ];
        
        return view('daftarhadir.index', $data);
    }

    public function form($id = null)
    {
        $penempatan = DB::table('penempatan')->where('id_pengguna', session()->get('id_pengguna'))->first();
        if (!$penempatan) {
            return redirect('daftar-hadir')->with('error', 'Anda belum ditambahkan kedalam DU/DI. Silahkan hubungi Admin');
        }
        
        $data = [
            'title' => 'Form Daftar Hadir',
            'data' => $this->model->find(base64_decode($id)),
            'id_penempatan' => $penempatan->id_penempatan
        ];

        return view('daftarhadir.index', $data);
    }
}

```
