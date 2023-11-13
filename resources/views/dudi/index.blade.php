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
        <div class="float-right">
            <a class="btn btn-success" href="{{url("dudi/form")}}">
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
                        <th>Nama Dudi</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th>Website</th>
                        <th>Email</th>
                        <th>Nama Pimpinan</th>
                        <th style="width: 5%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $show)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$show->nama_dudi}}</td>
                            <td>{{$show->alamat}}</td>
                            <td>{{$show->no_telp}}</td>
                            <td>{{$show->website}}</td>
                            <td>{{$show->email}}</td>
                            <td>{{$show->nama_pimpinan}}</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{url("dudi/form/" . base64_encode($show->id_dudi))}}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{url("dudi/detail/" . base64_encode($show->id_dudi))}}" class="btn btn-info btn-sm ml-2">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{url("dudi/delete/" . base64_encode($show->id_dudi))}}" class="btn btn-danger btn-sm ml-2">
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
