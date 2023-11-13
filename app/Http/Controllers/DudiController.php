<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dudi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Penempatan;
use App\Models\Pembimbing;

class DudiController extends Controller
{
    public function __construct()
    {
        $this->model = new Dudi();
        $this->penempatan = new Penempatan();
        $this->pembimbing = new Pembimbing();
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

    public function detail($id = null)
    {
        $data = [
            'data' => $this->model->find(base64_decode($id)),
            'title' => 'Detail Informasi Dudi',
            'siswa' => DB::table('penempatan')->where('penempatan.id_mitra', base64_decode($id))->leftJoin('pengguna', 'pengguna.id_pengguna', '=', 'penempatan.id_pengguna')->get(), 
            'pembimbing' => DB::table('pembimbing_dudi')->leftJoin('pengguna', 'pengguna.id_pengguna', '=','pembimbing_dudi.id_pengguna')->where('pembimbing_dudi.id_dudi', base64_decode($id))->first()
        ];
        
        return view('dudi.detail', $data);
    }

    public function formSiswa($id, $id_penempatan = null)
    {
        $data = [
            'data' => $this->penempatan->find(base64_decode($id_penempatan)),
            'id_dudi' => base64_decode($id),
            'title' => 'Form Tambah Siswa',
            'pengguna' => DB::table('pengguna')->where('id_jenis_pengguna', 2)->get()
        ];

        return view('dudi.formtambahsiswa', $data);
    }

    public function saveSiswa(Request $request)
    {
        $id = $request->get('id');
        $id_dudi = $request->get('id_dudi');

        $validate = $request->validate([
            'id_pengguna' => ['required'],
            'tgl_mulai_pkl' => ['required']
        ]);

        $validate['id_mitra'] = $id_dudi;
        $validate['tgl_selesai_pkl'] = $request->get('tgl_mulai_pkl');

        if ($id == null) {
            $this->penempatan->insert($validate);

            return redirect('dudi/detail/' . base64_encode($id_dudi))->with('success', 'Berhasil menambahkan siswa');
        } else {
            $this->penempatan->where('id_penempatan', $id)->update($validate);

            return redirect('dudi/detail/' . base64_encode($id_dudi))->with('success', 'Berhasil memperbarui siswa');
        }
    }

    public function destroySiswa($id, $id_penempatan)
    {
        $this->penempatan->where('id_penempatan', base64_decode($id_penempatan))->delete();

        return redirect('dudi/detail/' . $id)->with('success', 'Berhasil menghapus siswa');
    }

    public function formPembimbing($id, $id_pembimbing_dudi = null)
    {
        $data = [
            'data' => $this->pembimbing->find(base64_decode($id_pembimbing_dudi)),
            'id_dudi' => base64_decode($id),
            'title' => 'Form Tambah Pembimbing',
            'pengguna' => DB::table('pengguna')->where('id_jenis_pengguna', 3)->get()
        ];

        return view('dudi.formtambahpembimbing', $data);
    }

    public function savePembimbing(Request $request)
    {
        $id = $request->get('id');
        $id_dudi = $request->get('id_dudi');

        $validate = $request->validate([
            'id_pengguna' => ['required']
        ]);

        $validate['id_dudi'] = $id_dudi;

        if ($id == null) {
            $this->pembimbing->insert($validate);

            return redirect('dudi/detail/' . base64_encode($id_dudi))->with('success', 'Berhasil menambahkan guru pembimbing');
        } else {
            $this->pembimbing->where('id_pembimbing_dudi', $id)->update($validate);

            return redirect('dudi/detail/' . base64_encode($id_dudi))->with('success', 'Berhasil memperbarui guru pembimbing');
        }
    }

    public function destroyPembimbing($id, $id_pembimbing_dudi)
    {
        $this->pembimbing->where('id_pembimbing_dudi', base64_decode($id_pembimbing_dudi))->delete();

        return redirect('dudi/detail/' . $id)->with('success', 'Berhasil menghapus guru pembimbing');
    }
}
