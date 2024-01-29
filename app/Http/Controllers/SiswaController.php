<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->model = new Siswa();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Siswa'
        ];

        return view('siswa.index', $data);
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
                    $btn .= '<a href="' . url('siswa/' . base64_encode($row->id_pengguna)) . '" class="dropdown-item"><i class="fas fa-user"></i> Detail</a>';
                    $btn .= '<a href="' . url('siswa/form/' . base64_encode($row->id_pengguna)) . '" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>';
                    $btn .= '<button type="button" class="dropdown-item" onclick="hapusPengguna(' . $row->id_pengguna . ')"><i class="fas fa-trash"></i> Hapus</button>';
                    $btn .= '</div>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function form(String $id = null)
    {
        $data = [
            'title' => 'Form Siswa',
            'data' => $this->model->select('pengguna.*', 'detail_siswa.*')->leftJoin('detail_siswa', 'detail_siswa.id_pengguna', '=', 'pengguna.id_pengguna')
            ->where('pengguna.id_pengguna', base64_decode($id))->first(),
        ];

        return view('siswa.form', $data);
    }

    public function store(Request $request)
    {
        $id = $request->get('id');

        if ($id == null) {
            $uniqueNis = ['required', 'unique:detail_siswa'];
            $uniqueUsername = ['required', 'unique:pengguna'];
        } else {
            $uniqueNis = $request->get('nis') != $request->get('nis_lama') ? ['unique:detail_siswa'] : ['required'];
            $uniqueUsername = $request->get('username') != $request->get('username_lama') ? ['unique:pengguna'] : ['required'];
        }

        $validateDetail = $request->validate([
            'nis' => $uniqueNis
        ]);

        $validate = $request->validate([
            'username' => $uniqueUsername,
            'nama_lengkap' => ['required'],
            'jenis_kelamin' => ['required'],
        ]);

        $validate['id_jenis_pengguna'] = 2;
        $validate['kata_kunci'] = Hash::make('123456789');

        if ($request->get('golongan_darah')) {
            $validate['golongan_darah'] = $request->get('golongan_darah');
        }

        if ($request->get('catatan_kesehatan')) {
            $validate['catatan_kesehatan'] = $request->get('catatan_kesehatan');
        }

        if ($request->get('alamat')) {
            $validate['alamat'] = $request->get('alamat');
        }

        $validateDetail['ttl'] = $request->get('ttl');
        $validateDetail['nama_orang_tua_wali'] = $request->get('nama_orang_tua_wali');
        $validateDetail['alamat_orang_tua_wali'] = $request->get('alamat_orang_tua_wali');
        $validateDetail['telp_orang_tua_wali'] = $request->get('telp_orang_tua_wali');
        $validateDetail['riwayat_kesehatan'] = $request->get('riwayat_kesehatan');

        if ($id == null) {
            $idPengguna = $this->model->create($validate);
            $validateDetail['id_pengguna'] = $idPengguna['id_pengguna'];

            DB::table('detail_siswa')->insert($validateDetail);
        } else {
            $this->model->where('id_pengguna', $id)->update($validate);

            DB::table('detail_siswa')->where('id_pengguna', $id)->update($validateDetail);
        }

        return redirect('siswa')->with('success', 'Berhasil menyimpan data siswa');
    }

    public function destroy(Request $request)
    {
        $this->model->where('id_pengguna', $request->get('id'))->delete();
        return response()->json(['status' => 'oke']);
    }
}
