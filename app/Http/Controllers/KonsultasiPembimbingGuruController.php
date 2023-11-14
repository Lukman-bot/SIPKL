<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonsultasiPembimbingGuruController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Konsultasi Pembimbing Guru'
        ];
        
        return view('konsultasipembimbingguru.index', $data);
    }
}
