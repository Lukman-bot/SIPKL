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
}
