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
                        <input type="text" class="form-control" name="username" placeholder="Masukkan username" required value="{{@$data['username']}}">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan password" {{@$data['id_pengguna'] == '' ? 'required' : ''}}>
                    </div>
                    <div class="form-group">
                        <label for="">Gelar Depan</label>
                        <input type="text" class="form-control" name="gelar_depan" placeholder="Masukkan gelar depan" value="{{@$data['gelar_depan']}}">
                    </div>
                    <div class="form-group">
                        <label for="">Gelar Belakang</label>
                        <input type="text" class="form-control" name="gelar_belakang" placeholder="Masukkan gelar belakang" value="{{@$data['gelar_belakang']}}">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan nama lengkap" required value="{{@$data['nama_lengkap']}}">
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
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="">--Pilih Jenis Kelamin--</option>
                            <option value="laki-laki" {{@$data['jenis_kelamin'] == 'laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                            <option value="perempuan" {{@$data['jenis_kelamin'] == 'perempuan' ? 'selected' : ''}}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Golongan Darah</label>
                        <input type="text" class="form-control" name="golongan_darah" placeholder="Masukkan golongan darah" value="{{@$data['golongan_darah']}}">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat" required value="{{@$data['alamat']}}">
                    </div>
                    <div class="form-group">
                        <label for="">Catatan Kesehatan</label>
                        <input type="text" class="form-control" name="catatan_kesehatan" placeholder="Masukkan catatan kesehatan" value="{{@$data['catatan_kesehatan']}}">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
