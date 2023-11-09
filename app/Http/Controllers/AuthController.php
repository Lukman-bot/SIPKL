<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        if (session()->get('id_pengguna')) return redirect('/dashboard');

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'kata_kunci' => 'required'
        ]);

        $pengguna = Pengguna::where('username', $validate['username'])->first();

        if ($pengguna === null) {
            return redirect('/')->with('error', 'Username tidak terdaftar!');
        }

        if (!password_verify($validate['kata_kunci'], $pengguna['kata_kunci'])) {
            return redirect('/')->with('error', 'Password salah!');
        }

        $request->session()->put([
            'nama_lengkap' => $pengguna['nama_lengkap'],
            'id_pengguna' => $pengguna['id_pengguna'],
            'id_jenis_pengguna' => $pengguna['id_jenis_pengguna']
        ]);

        return redirect('dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->regenerate();
        $request->session()->invalidate();
        return redirect('/');
    }
}