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