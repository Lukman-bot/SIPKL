<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dudi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DudiController extends Controller
{
    public function __construct()
    {
        $this->model = new Dudi();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Dudi',
            'data' => Dudi::all()
        ];
        
        return view('dudi.index', $data);
    }

    public function form($id = null)
    {
        $data = [
            'data' => $this->model->find(base64_decode($id)),
            'title' => 'Form Tambah Dudi'
        ];

        return view('dudi.form', $data);
    }

    public function store(Request $request)
    {
        $id = $request->get('id');

        $validate['nama_dudi'] = $request->get('nama_dudi');
        $validate['alamat'] = $request->get('alamat');
        $validate['no_telp'] = $request->get('no_telp');
        $validate['website'] = $request->get('website');
        $validate['email'] = $request->get('email');
        $validate['nama_pimpinan'] = $request->get('nama_pimpinan');

        if ($id == null) {
            $this->model->insert($validate);

            return redirect('dudi')->with('success', 'Berhasil menyimpan data');
        } else {
            $this->model->where('id_dudi', $id)->update($validate);

            return redirect('dudi')->with('success', 'Berhasil update data');
        }
    }

    public function destroy($id)
    {
        $this->model->where('id_dudi', base64_decode($id))->delete();

        return redirect('dudi')->with('success', 'Berhasil menghapus data');
    }
}
