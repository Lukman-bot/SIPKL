@extends('template/template')
@section('views')
<div class="row">
    <div class="col-lg-8">
        <form action="{{url("pengguna")}}" method="post" id="form">
            @csrf
            <div class="card">
                <div class="card-header">
                    <a href="{{url("pengguna")}}" class="btn btn-warning">
                        <i class="fas fa-chevron-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success float-right">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id" value="{{ @$data['id_pengguna'] }}">
                    <div class="form-group">
                        <label for="">Username<small class="text-danger">*</small></label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan username anda"
                            value="{{old('username', @$data['username'])}}" required>
                        <input type="hidden" name="username_lama" value="{{@$data['username']}}">
                        @error('username')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror()
                    </div>
                    <div class="form-group">
                        <label for="">Kata Kunci<small class="text-danger">*</small></label>
                        <input type="password" class="form-control" name="kata_kunci" placeholder="Kata kunci minimal 7 karakter"
                            minlength="7" value="{{old('kata_kunci')}}" @if (!@$data['id_pengguna'])required @endif>
                    </div>
                    <div class="form-group">
                        <label for="">Gelar Depan</label>
                        <input type="text" class="form-control" name="gelar_depan" placeholder="Masukkan gelar depan anda"
                            value="{{old('gelar_depan', @$data['gelar_depan'])}}">
                        <input type="hidden" name="gelar_depan_lama" value="{{@$data['gelar_depan']}}">
                        @error('gelar_depan')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror()
                    </div>
                    <div class="form-group">
                        <label for="">Gelar Belakang</label>
                        <input type="text" class="form-control" name="gelar_belakang" placeholder="Masukkan gelar belakang anda"
                            value="{{old('gelar_belakang', @$data['gelar_belakang'])}}">
                        <input type="hidden" name="gelar_belakang_lama" value="{{@$data['gelar_belakang']}}">
                        @error('gelar_belakang')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror()
                    </div>
                    <div class="form-group">
                        <label for="">Nama Lengkap<small class="text-danger">*</small></label>
                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan Nama Lengkap anda"
                            value="{{old('nama_lengkap', @$data['nama_lengkap'])}}" required>
                        <input type="hidden" name="nama_lengkap_lama" value="{{@$data['nama_lengkap']}}">
                        @error('nama_lengkap')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror()
                    </div>
                    <div class="form-group">
                        <label for="">Golongan Darah</label>
                        <input type="text" class="form-control" name="golongan_darah" placeholder="Masukkan golongan darah anda"
                            value="{{old('golongan_darah', @$data['golongan_darah'])}}">
                        @error('golongan_darah')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror()
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat anda"
                            value="{{old('alamat', @$data['alamat'])}}">
                        @error('alamat')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror()
                    </div>
                    <div class="form-group">
                        <label for="">Catatan Kesehatan</label>
                        <input type="text" class="form-control" name="catatan_kesehatan" placeholder="Masukkan catatan kesehatan anda"
                            value="{{old('catatan_kesehatan', @$data['catatan_kesehatan'])}}">
                        @error('catatan_kesehatan')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror()
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Pengguna<small class="text-danger">*</small></label>
                        <select name="id_jenis_pengguna" id="id_jenis_pengguna" class="form-control" required>
                            <option value="">--Pilih Jenis Pengguna</option>
                            @foreach ($jenis_pengguna as $show)
                                @php
                                    $selected = $show->id_jenis_pengguna == old('id_jenis_pengguna') ? 'selected' : ''
                                @endphp
                                <option value="{{$show->id_jenis_pengguna}}" {{@$data['id_jenis_pengguna'] == $show->id_jenis_pengguna ? 'selected' : ''}} {{$selected}}>
                                    {{$show->jenis_pengguna}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin<small class="text-danger">*</small></label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="">--Pilih Jenis Kelamin--</option>
                            <option value="laki-laki" {{@$data['jenis_kelamin'] == 'laki-laki' ? 'selected' : ''}} {{old('jenis_kelamin') == 'laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                            <option value="perempuan" {{@$data['jenis_kelamin'] == 'perempuan' ? 'selected' : ''}} {{old('jenis_kelamin') == 'perempuan' ? 'selected' : ''}}>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    *) Masukan ditandai bintang, wajib diisi
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#form").validate({
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    })
</script>
@endsection
