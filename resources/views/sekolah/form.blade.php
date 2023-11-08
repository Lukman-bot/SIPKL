<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
</head>
<body>
    <h1>{{$title}}</h1>
    <form action="{{url("sekolah")}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ @$data['id_sekolah'] }}">
        <input type="text" name="nama_sekolah" value="{{ @$data['nama_sekolah'] }}" placeholder="Masukkan nama sekolah" required>
        <br><br>
        <input type="text" name="alamat_sekolah" value="{{ @$data['alamat_sekolah'] }}" placeholder="Masukkan alamat sekolah" required>
        <br><br>
        <input type="text" name="telepon_sekolah" value="{{ @$data['telepon_sekolah'] }}" placeholder="Masukkan telepon sekolah" required>
        <br><br>
        <input type="text" name="website" value="{{ @$data['website'] }}" placeholder="Masukkan website sekolah" required>
        <br><br>
        <input type="text" name="alamat_email" value="{{ @$data['alamat_email'] }}" placeholder="Masukkan email sekolah" required>
        <br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>