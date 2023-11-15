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


## Script Detail DU/DI
```console
@extends('template/template')
@section('views')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" ariahidden="true">&times;</button>
    {{ session('success') }}
</div>
@endif
<div class="card">
    <div class="card-header">
        <a href="{{url("dudi")}}" class="btn btn-warning">
            <i class="fa fa-angle-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-lg-2">Nama DU/DI</dt>
            <dd class="col-lg-10">: {{$data['nama_dudi']}}</dd>
            <dt class="col-lg-2">Nama Pimpinan</dt>
            <dd class="col-lg-10">: {{$data['nama_pimpinan']}}</dd>
            <dt class="col-lg-2">Alamat</dt>
            <dd class="col-lg-10">: {{$data['alamat']}}</dd>
            <dt class="col-lg-2">No. Telp</dt>
            <dd class="col-lg-10">: {{$data['no_telp']}}</dd>
            <dt class="col-lg-2">Email</dt>
            <dd class="col-lg-10">: {{$data['email']}}</dd>
            <dt class="col-lg-2">Website</dt>
            <dd class="col-lg-10">: {{$data['website']}}</dd>
        </dl>

        <div class="card">
            <div class="card-header">
                Informasi Pembimbing DU/DI
                @if (!$pembimbing)
                    <div class="float-right">
                        <a href="{{url("dudi/form-pembimbing/" . base64_encode($data['id_dudi']))}}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Pilih Pembimbing
                        </a>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 3%;">No</th>
                                <th>Nama Pembimbing</th>
                                <th>Alamat</th>
                                <th style="width: 5%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pembimbing)
                                <tr>
                                    <td>1</td>
                                    <td>{{$pembimbing->nama_lengkap}}</td>
                                    <td>{{$pembimbing->alamat}}</td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="{{url("dudi/form-pembimbing/" . base64_encode($data['id_dudi']) . '/' . base64_encode($pembimbing->id_pembimbing_dudi))}}" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{url("dudi/delete-pembimbing/" . base64_encode($data['id_dudi']) . '/' . base64_encode($pembimbing->id_pembimbing_dudi))}}" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
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
                @if (!$pembimbing)
                    <div class="float-right">
                        <a href="{{url("dudi/form-pembimbing-guru/" . base64_encode($data['id_dudi']))}}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Pilih Pembimbing
                        </a>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 3%;">No</th>
                                <th>Nama Pembimbing</th>
                                <th>Alamat</th>
                                <th style="width: 5%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pembimbingGuru)
                                <tr>
                                    <td>1</td>
                                    <td>{{$pembimbingGuru->nama_lengkap}}</td>
                                    <td>{{$pembimbingGuru->alamat}}</td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="{{url("dudi/form-pembimbing-guru/" . base64_encode($data['id_dudi']) . '/' . base64_encode($pembimbingGuru->id_pembimbing_guru))}}" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{url("dudi/delete-pembimbing-guru/" . base64_encode($data['id_dudi']) . '/' . base64_encode($pembimbingGuru->id_pembimbing_guru))}}" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
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
                List Siswa
                <div class="float-right">
                    <a href="{{url("dudi/form-siswa/" . base64_encode($data['id_dudi']))}}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah Siswa
                    </a>
                </div>
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
                                <th style="width: 5%;">Aksi</th>
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
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="{{url("dudi/form-siswa/" . base64_encode($data['id_dudi']) . '/' . base64_encode($show->id_penempatan))}}" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{url("dudi/delete-siswa/" . base64_encode($data['id_dudi']) . '/' . base64_encode($show->id_penempatan))}}" class="btn btn-sm btn-danger">
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
    </div>
</div>
@endsection
```
