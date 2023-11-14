@php
    use Illuminate\Support\Facades\DB;
@endphp

@extends('template/template')
@section('views')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ session('success') }}
</div>
@endif
<div class="card">
    <div class="card-header">
        <div class="float-right">
            <a class="btn btn-success" href="{{url("pengguna/form")}}">
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
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Jenis Pengguna</th>
                        <th style="width: 5%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $show)
                        @php
                            $jenis_pengguna = DB::table('jenis_pengguna')
                                ->where('id_jenis_pengguna', $show->id_jenis_pengguna)
                                ->first();
                        @endphp
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$show->username}}</td>
                            <td>{{$show->nama_lengkap}}</td>
                            <td>{{$show->alamat}}</td>
                            <td>{{$jenis_pengguna->jenis_pengguna}}</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{url("pengguna/form/" . base64_encode($show->id_pengguna))}}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{url("pengguna/delete/" . base64_encode($show->id_pengguna))}}" class="btn btn-danger btn-sm ml-2">
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
