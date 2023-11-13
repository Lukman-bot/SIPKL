@extends('template/template')
@section('views')
<div class="row">
    <div class="col-lg-8">
        <form action="{{url("dudi")}}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    <a href="{{url("dudi")}}" class="btn btn-warning">
                        <i class="fas fa-angle-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success float-right">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id" value="{{@$data['id_dudi']}}">
                    <div class="form-group">
                        <label for="">Nama Dudi</label>
                        <input type="text" class="form-control" name="nama_dudi" placeholder="Masukkan nama dudi" required value="{{old('nama_dudi', @$data['nama_dudi'])}}">
                        @error('nama_dudi')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" required value="{{old('alamat', @$data['alamat'])}}">
                        @error('alamat')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">No. Telp</label>
                        <input type="text" class="form-control" name="no_telp" placeholder="Masukkan No. Telp" required value="{{old('no_telp', @$data['no_telp'])}}">
                        @error('no_telp')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Website</label>
                        <input type="text" class="form-control" name="website" placeholder="Masukkan Website" required value="{{old('website', @$data['website'])}}">
                        @error('website')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Masukkan email" required value="{{old('email', @$data['email'])}}">
                        @error('email')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pimpinan</label>
                        <input type="text" class="form-control" name="nama_pimpinan" placeholder="Masukkan Nama Pimpinan" required value="{{old('nama_pimpinan', @$data['nama_pimpinan'])}}">
                        @error('nama_pimpinan')
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
