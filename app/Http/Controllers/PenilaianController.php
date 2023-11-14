<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Penilaian'
        ];
        
        return view('penilaian.index', $data);
    }
}
