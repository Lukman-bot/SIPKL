<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function __construct()
    {
        $this->model = new Pengguna();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pengguna',
            'data' => Pengguna::all()
        ];
        
        return view('pengguna.index', $data);
    }

    public function form($id = null)
    {
        $data = [
            'data' => $this->model->find(base64_decode($id)),
            'jenis_pengguna' => DB::table('jenis_pengguna')->get(),
            'title' => 'Form Tambah Pengguna'
        ];

        return view('pengguna.form', $data);
    }

    public function store(Request $request)
    {
        $id = $request->get('id');

        $validate['username'] = $request->get('username');
        $validate['nama_lengkap'] = $request->get('nama_lengkap');
        $validate['jenis_kelamin'] = $request->get('jenis_kelamin');
        $validate['alamat'] = $request->get('alamat');
        $validate['id_jenis_pengguna'] = $request->get('id_jenis_pengguna');

        if ($request->get('password')) {
            $validate['kata_kunci'] = Hash::make($request->get('password'));
        }

        if ($request->get('gelar_depan')) {
            $validate['gelar_depan'] = $request->get('gelar_depan');
        }

        if ($request->get('gelar_belakang')) {
            $validate['gelar_belakang'] = $request->get('gelar_belakang');
        }

        if ($request->get('golongan_darah')) {
            $validate['golongan_darah'] = $request->get('golongan_darah');
        }

        if ($request->get('catatan_kesehatan')) {
            $validate['catatan_kesehatan'] = $request->get('catatan_kesehatan');
        }

        if ($id == null) {
            $this->model->insert($validate);
        } else {
            $this->model->where('id_pengguna', $id)->update($validate);
        }

        return redirect('pengguna')->with('success', 'Berhasil menyimpan data pengguna');
    }

    public function destroy($id)
    {
        $this->model->where('id_pengguna', base64_decode($id))->delete();

        return redirect('pengguna')->with('success', 'Berhasil menghapus data pengguna');
    }
}
