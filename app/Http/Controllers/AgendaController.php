<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Agenda'
        ];
        
        return view('agenda.index', $data);
    }
}
