@extends('template/template')
@section('views')
<div class="row">
    <div class="col-lg-8">
        <form action="{{url("pengguna")}}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    <a href="{{url("pengguna")}}" class="btn btn-warning">
                        <i class="fas fa-angle-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success float-right">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id" value="{{@$data['id_pengguna']}}">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan username" required value="{{old('username', @$data['username'])}}">
                        <input type="hidden" name="username_lama" value="{{@$data['username']}}">
                        @error('username')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan password" {{@$data['id_pengguna'] == '' ? 'required' : ''}} value="{{old('password')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Gelar Depan</label>
                        <input type="text" class="form-control" name="gelar_depan" placeholder="Masukkan gelar depan" value="{{old('gelar_depan', @$data['gelar_depan'])}}">
                        @error('gelar_depan')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Gelar Belakang</label>
                        <input type="text" class="form-control" name="gelar_belakang" placeholder="Masukkan gelar belakang" value="{{old('gelar_belakang', @$data['gelar_belakang'])}}">
                        @error('gelar_belakang')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan nama lengkap" required value="{{old('nama_lengkap', @$data['nama_lengkap'])}}">
                        @error('nama_lengkap')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Pengguna</label>
                        <select name="id_jenis_pengguna" id="id_jenis_pengguna" class="form-control" required>
                            <option value="">--Pilih Jenis Pengguna</option>
                            @foreach ($jenis_pengguna as $show)
                                <option value="{{$show->id_jenis_pengguna}}" {{@$data['id_jenis_pengguna'] == $show->id_jenis_pengguna ? 'selected' : ''}}>
                                    {{$show->jenis_pengguna}}
                                </option>
                            @endforeach
                        </select>
                        @error('jenis_pengguna')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="">--Pilih Jenis Kelamin--</option>
                            <option value="laki-laki" {{@$data['jenis_kelamin'] == 'laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                            <option value="perempuan" {{@$data['jenis_kelamin'] == 'perempuan' ? 'selected' : ''}}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Golongan Darah</label>
                        <input type="text" class="form-control" name="golongan_darah" placeholder="Masukkan golongan darah" value="{{old('golongan_darah', @$data['golongan_darah'])}}">
                        @error('golongan_darah')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat" required value="{{old('alamat', @$data['alamat'])}}">
                        @error('alamat')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Catatan Kesehatan</label>
                        <input type="text" class="form-control" name="catatan_kesehatan" placeholder="Masukkan catatan kesehatan" value="{{old('catatan_kesehatan', @$data['catatan_kesehatan'])}}">
                        @error('catatan_kesehatan')
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
