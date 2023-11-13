<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

        if ($id == null) {
            $uniqueUsername = ['required', 'unique:pengguna'];
        } else {
            $uniqueUsername = $request->get('username') != $request->get('username_lama') ? ['unique:pengguna'] : ['required'];
        }

        $validate = $request->validate([
            'username' => $uniqueUsername,
            'nama_lengkap' => ['required'],
            'jenis_kelamin' => ['required'],
            'alamat' => ['required'],
            'id_jenis_pengguna' => ['required']
        ]);

        $validate['gelar_depan'] = $request->get('gelar_depan');
        $validate['gelar_belakang'] = $request->get('gelar_belakang');
        $validate['golongan_darah'] = $request->get('golongan_darah');
        $validate['catatan_kesehatan'] = $request->get('catatan_kesehatan');

        if ($request->get('password')) {
            $validate['kata_kunci'] = Hash::make($request->get('password'));
        }

        if ($id == null) {
            $this->model->insert($validate);
            return redirect('pengguna')->with('success', 'Berhasil menyimpan data pengguna');
        } else {
            $this->model->where('id_pengguna', $id)->update($validate);
            return redirect('pengguna')->with('success', 'Berhasil memperbarui data pengguna');
        }
    }

    public function destroy($id)
    {
        $this->model->where('id_pengguna', base64_decode($id))->delete();

        return redirect('pengguna')->with('success', 'Berhasil menghapus data pengguna');
    }
}
