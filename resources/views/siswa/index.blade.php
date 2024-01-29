@extends('template/template')
@section('views')
<div class="row">
    <div class="col-lg-12">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div id="flashdata"></div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-3">
                        <div class="input-group">
                            <input type="text" name="cari" class="form-control" id="form-search"
                                placeholder="Cari data siswa">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="button" id="btn-search" onclick="reload()">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-3"></div>
                    <div class="col-6">
                        <div class="float-right">
                            <a href="{{ url('siswa/form') }}" class="btn btn-success">
                                <i class="fas fa-plus"></i> Tambah
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered" id="table" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Nama Lengkap</th>
                            <th>NIS</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Tempat Tgl. Lahir</th>
                            <th style="width: 5%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var table
    $(function() {
        table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            retrieve: true,
            destroy: true,
            order: [],
            searching: false,
            entries: false,
            bLengthChange: false,
            ordering: false,
            language: {
				infoFiltered: "",
				sZeroRecords: "Data Siswa Tidak Ditemukan",
			},
            ajax: {
                url: '{!! route('siswa.listData') !!}',
                method: 'post',
                data: (data) => {
                    data._token = '{{ csrf_token() }}'
                    data.search_pengguna = $("#form-search").val()
                }
            },
            "columnDefs": [{
                "orderable": false,
                "targets": [0, 1, 2, 3, 4, 5, 6],
            }],
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama_lengkap',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'username',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'jenis_kelamin',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'alamat',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'ttl',
                    name: 'ttl',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });

    const reload = () => {
        table.ajax.reload()
    }

    const hapusPengguna = (id) => {
        if (confirm('Apakah Anda yakin?')) {
            $.ajax({
                type: "POST",
                url: "{{ url('siswa/delete') }}",
                data: {
                    id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: "JSON",
                success: function(response) {
                    reload()
                    $('#flashdata').html('');
                    $('#check-all').prop('checked', false);
                    $('<div class="alert alert-success alert-dismissible" id="alert" style="font-weight: bold;">Berhasil hapus</div>')
                        .show().appendTo('#flashdata');
                    $('#alert').delay(2750).slideUp('slow', function() {
                        $(this).remove();
                    });
                }
            });
        }
    }

    $(document).keyup(function(event) {
        if ($("#form-search").is(":focus") && event.key == "Enter") {
            reload()
        }
    });
</script>
@endsection
