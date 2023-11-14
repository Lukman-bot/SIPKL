<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarHadirController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Hadir'
        ];
        
        return view('daftarhadir.index', $data);
    }
}
