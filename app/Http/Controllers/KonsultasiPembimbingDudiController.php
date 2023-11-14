<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonsultasiPembimbingDudiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Konsultasi Pembimbing Dudi'
        ];
        
        return view('konsultasipembimbingdudi.index', $data);
    }
}
