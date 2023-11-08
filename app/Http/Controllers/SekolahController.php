<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;

class SekolahController extends Controller
{
    public function __construct()
    {
        $this->model = new Sekolah();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Sekolah',
            'data' => Sekolah::all()
        ];

        return view('sekolah.index', $data);
    }

    public function form($id = null)
    {
        $data = [
            'title' => 'Form Sekolah',
            'data' => $this->model->find(base64_decode($id))
        ];

        return view('sekolah.form', $data);
    }

    public function store(Request $request)
    {
        $id = $request->get('id');

        $validate['nama_sekolah'] = $request->get('nama_sekolah');
        $validate['alamat_sekolah'] = $request->get('alamat_sekolah');
        $validate['telepon_sekolah'] = $request->get('telepon_sekolah');
        $validate['website'] = $request->get('website');
        $validate['alamat_email'] = $request->get('alamat_email');

        if ($id == null) {
            $this->model->insert($validate);
        } else {
            $this->model->where('id_sekolah', $id)->update($validate);
        }

        return redirect('sekolah');
    }

    public function destroy($id)
    {
        $this->model->where('id_sekolah', base64_decode($id))->delete();
        return redirect('sekolah');
    }
}
