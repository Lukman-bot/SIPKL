<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
</head>
<body>
    <h1>{{$title}}</h1>
    <a href="{{url("sekolah/form")}}">Tambah</a>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Sekolah</th>
                <th>Alamat Sekolah</th>
                <th>Telepon Sekolah</th>
                <th>Website</th>
                <th>Email Sekolah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $show)
                <tr>
                    <td>{{ $show->id_sekolah }}</td>
                    <td>{{ $show->nama_sekolah }}</td>
                    <td>{{ $show->alamat_sekolah }}</td>
                    <td>{{ $show->telepon_sekolah }}</td>
                    <td>{{ $show->website }}</td>
                    <td>{{ $show->alamat_email }}</td>
                    <td>
                        <a href="{{url("sekolah/form/" . base64_encode($show->id_sekolah))}}">
                            Edit
                        </a>
                        |
                        <a href="{{url("sekolah/delete/" . base64_encode($show->id_sekolah))}}">
                            Hapus
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>