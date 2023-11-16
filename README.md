# SIPKL (Sistem Informasi Praktek Kerja Lapangan)

## Overview Aplikasi

Aplikasi ini merupakan <i>Web Based Application</i>. Aplikasi ini di bangun menggunakan <b>Framework</b> <a href="https://laravel.com/docs/10.x/releases" target="_blank">Laravel</a> versi 10.

Aplikasi ini dibangun bertujuan untuk membuat sistem yang akan mengelola data <i>Praktek Kerja Lapangan</i> dari siswa yang bersekolah di <b>SMK Daarul Abroor</b>.

## Tutorial Penginstalan Aplikasi

Ada beberapa hal yang harus dipersiapkan untuk menjalankan aplikasi ini. Beberapa aplikasi lain yang sudah harus Anda siapkan di antaranya adalah:
* <a href="https://www.apachefriends.org/" target="_blank">Xampp</a> dengan versi php >8.2
* <a href="https://getcomposer.org/" target="_blank">Composer</a>

Untuk tata cara penginstalan aplikasi, silahkan Anda ikuti langkah berikut untuk menjalankan aplikasi ini pada perangkat Anda.

Langkah pertama, silahkan download atau clone source ini pada perangkat Anda.

Selanjutnya, extract source code ini pada folder:

```console
C:\xampp\htdocs
```

Setelah selesai mengextract, silahkan buka folder source code-nya pada Visual Studio Code.
Selanjutnya, silahkan buka terminal Visual Studio Code, kemudian jalankan perintah berikut.

```console
composer update
```

Jika sudah selesai, maka lanjut ke perintah berikut.

```console
cp .env.example .env
```

Selanjutnya, silahkan generate kunci aplikasi laravel menggunakan perintah berikut.

```console
php artisan key:generate
```

Selanjutnya, silahkan buka file .env, kemudian cari bagian konfigurasi database. Ubah konfigurasinya menjadi seperti berikut.

```console
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_sip_pkl
DB_USERNAME=root
DB_PASSWORD=
```

Setelah membuat konfigurasi database pada file .env, selanjutnya silahkan jalankan migrasi database, atau ikuti perintah berikut.

```console
php artisan migrate
```

Setelah itu, silahkan running aplikasinya menggunakan perintah berikut.

```console
php artisan serve
```


## script controller dudi
```console
    public function formNilai($id, $id_penempatan = null)
    {
        $data = [
            'data' => $this->penempatan->find(base64_decode($id_penempatan)),
            'id_dudi' => base64_decode($id),
            'title' => 'Form Tambah Nilai Siswa'
        ];

        return view('dudi.formtambahnilai', $data);
    }

    public function saveNilai(Request $request)
    {
        $id = $request->get('id');
        $id_dudi = $request->get('id_dudi');

        $validate = $request->validate([
            'nilai_angka' => ['required'],
            'nilai_mutu' => ['required']
        ]);

        if ($id == null) {
            $this->penempatan->insert($validate);

            return redirect('dudi/detail/' . base64_encode($id_dudi))->with('success', 'Berhasil menambahkan nilai siswa');
        } else {
            $this->penempatan->where('id_penempatan', $id)->update($validate);

            return redirect('dudi/detail/' . base64_encode($id_dudi))->with('success', 'Berhasil memperbarui nilai siswa');
        }
    }
```
