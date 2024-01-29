@extends('template/template')
@section('views')
<div class="row">
    <div class="col-lg-12">
        <form action="{{url("siswa")}}" method="post" id="form">
            @csrf
            <div class="card">
                <div class="card-header">
                    <a href="{{url("siswa")}}" class="btn btn-warning">
                        <i class="fas fa-chevron-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success float-right">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id" value="{{ @$data['id_pengguna'] }}">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Username<small class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="username" placeholder="Masukkan username"
                                    value="{{old('username', @$data['username'])}}" required readonly>
                                <input type="hidden" name="username_lama" value="{{@$data['username']}}">
                                @error('username')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror()
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">NIS Siswa<small class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="nis" id="nis" placeholder="Masukkan NIS Siswa"
                                    value="{{old('nis', @$data['nis'])}}">
                                <input type="hidden" name="nis_lama" value="{{@$data['nis']}}">
                                @error('nis')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror()
                            </div>
                        </div>
                        <div class="col-lg-4">
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
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Jenis Kelamin<small class="text-danger">*</small></label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="laki-laki" {{@$data['jenis_kelamin'] == 'laki-laki' ? 'selected' : ''}} {{old('jenis_kelamin') == 'laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                                    <option value="perempuan" {{@$data['jenis_kelamin'] == 'perempuan' ? 'selected' : ''}} {{old('jenis_kelamin') == 'perempuan' ? 'selected' : ''}}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
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
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Alamat Siswa</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat anda"
                                    value="{{old('alamat', @$data['alamat'])}}">
                                @error('alamat')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror()
                            </div>
                        </div>
                        <div class="col-lg-4">
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
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">TTL<small class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="ttl" placeholder="Masukkan TTL Siswa"
                                    value="{{old('ttl', @$data['ttl'])}}">
                                @error('ttl')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror()
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Nama Orang Tua/Wali<small class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="nama_orang_tua_wali" placeholder="Masukkan Nama Orang Tua/Wali Siswa"
                                    value="{{old('nama_orang_tua_wali', @$data['nama_orang_tua_wali'])}}">
                                @error('nama_orang_tua_wali')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror()
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Alamat Orang Tua/Wali<small class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="alamat_orang_tua_wali" placeholder="Masukkan Alamat Orang Tua/Wali Siswa"
                                    value="{{old('alamat_orang_tua_wali', @$data['alamat_orang_tua_wali'])}}">
                                @error('alamat_orang_tua_wali')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror()
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">No. Telp Orang Tua/Wali<small class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="telp_orang_tua_wali" placeholder="Masukkan No. Telp Orang Tua/Wali Siswa"
                                    value="{{old('telp_orang_tua_wali', @$data['telp_orang_tua_wali'])}}">
                                @error('telp_orang_tua_wali')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror()
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Riwayat Kesehatan Orang Tua/Wali<small class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="riwayat_kesehatan" placeholder="Masukkan Riwayat Kesehatan Orang Tua/Wali Siswa"
                                    value="{{old('riwayat_kesehatan', @$data['riwayat_kesehatan'])}}">
                                @error('riwayat_kesehatan')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror()
                            </div>
                        </div>
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
        $('#nis').change(function() {
            var username = $("#nis").val();
            console.log(username);
            $('#username').val(username)
            $("input[name=username]").val(username);
        })
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
