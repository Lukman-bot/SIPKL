# Tutorial Instalasi Web SIPKL (Sistem Informasi Praktek Kerja Lapangan)

Silahkan ikuti langkah berikut untuk menjalankan website ini pada perangkat Anda.

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

#kodingan formtambahsiswa.blade.php
```console
@extends('template/template')
@section('views')
<div class="row">
    <div class="col-lg-8">
        <form action="{{url("save-siswa")}}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    <a href="{{url("dudi/detail/" . base64_encode($id_dudi))}}" class="btn btn-warning">
                        <i class="fas fa-angle-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success float-right">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id" value="{{@$data['id_penempatan']}}">
                    <input type="hidden" name="id_dudi" value="{{$id_dudi}}">
                    <div class="form-group">
                        <label for="">Siswa</label>
                        <select name="id_pengguna" id="id_pengguna" class="form-control" required>
                            <option value="">--Pilih Siswa</option>
                            @foreach ($pengguna as $show)
                                @php
                                    $selected = old('id_pengguna') == $show->id_pengguna ? 'selected' : ''
                                @endphp
                                <option value="{{$show->id_pengguna}}" {{@$data['id_pengguna'] == $show->id_pengguna ? 'selected' : ''}} {{$selected}}>
                                    {{$show->nama_lengkap}}
                                </option>
                            @endforeach
                        </select>
                        @error('id_pengguna')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tgl. Mulai PKL</label>
                        <input type="date" class="form-control" name="tgl_mulai_pkl" required value="{{old('tgl_mulai_pkl', @$data['tgl_mulai_pkl'])}}">
                        @error('tgl_mulai_pkl')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tgl. Selesai PKL</label>
                        <input type="date" class="form-control" name="tgl_selesai_pkl" value="{{old('tgl_selesai_pkl', @$data['tgl_selesai_pkl'])}}">
                        @error('tgl_selesai_pkl')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
```
