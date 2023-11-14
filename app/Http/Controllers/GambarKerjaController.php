<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GambarKerjaController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Gambar Kerja'
        ];
        
        return view('gambarkerja.index', $data);
    }
}
