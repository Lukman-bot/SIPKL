<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function __construct()
    {
        $this->model = new Pengguna();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pengguna'
        ];

        return view('pengguna.index', $data);
    }

    public function listData(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->model->getDatatables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $btn = '<div>';
                    $btn .= '<button type="button" class="btn btn-default" data-toggle="dropdown">';
                    $btn .= '<i class="fas fa-bars"></i>';
                    $btn .= '</button>';
                    $btn .= '<div class="dropdown-menu" role="menu">';
                    $btn .= '<a href="' . url('pengguna/' . base64_encode($row->id_pengguna)) . '" class="dropdown-item"><i class="fas fa-user"></i> Detail</a>';
                    $btn .= '<a href="' . url('pengguna/form/' . base64_encode($row->id_pengguna)) . '" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>';
                    $btn .= '<button type="button" class="dropdown-item" onclick="hapusPengguna(' . $row->id_pengguna . ')"><i class="fas fa-trash"></i> Hapus</button>';
                    $btn .= '</div>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->addColumn('nama_dan_gelar', function($row) {
                    $gelar_depan = $row->gelar_depan ? $row->gelar_depan . ' ' : '';
                    $gelar_belakang = $row->gelar_belakang ? ', ' . $row->gelar_belakang : '';

                    return $gelar_depan . $row->nama_lengkap . $gelar_belakang;
                })
                ->addColumn('hak_akses', function ($row) {
                    $hak_akses = '';
                    $ket_role = DB::table('jenis_pengguna')->where('id_jenis_pengguna', $row->id_jenis_pengguna)->first();
                    $hak_akses .= '<small class="badge badge-info">' . $ket_role->jenis_pengguna . '</small>';
                    return $hak_akses;
                })
                ->rawColumns(['action', 'hak_akses', 'nama_dan_gelar'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function form(String $id = null)
    {
        $data = [
            'title' => 'Form Pengguna',
            'jenis_pengguna' => DB::table('jenis_pengguna')->whereNot('id_jenis_pengguna', 2)->get(),
            'data' => $this->model->find(base64_decode($id)),
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
            'id_jenis_pengguna' => ['required']
        ]);

        if ($request->get('kata_kunci')) {
            $validate['kata_kunci'] = Hash::make($request->get('kata_kunci'));
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

        if ($request->get('alamat')) {
            $validate['alamat'] = $request->get('alamat');
        }

        if ($id == null) {
            $this->model->insert($validate);
        } else {
            $this->model->where('id_pengguna', $id)->update($validate);
        }

        return redirect('pengguna')->with('success', 'Berhasil menyimpan data pengguna');
    }

    public function destroy(Request $request)
    {
        $this->model->where('id_pengguna', $request->get('id'))->delete();
        return response()->json(['status' => 'oke']);
    }
}
