<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login()
    {
        $validated = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($validated)) {
            if (Auth::user()->role == 'pegawai') {
                return redirect('profil-pegawai');
            }else {
                return redirect()->intended('/');
            }
        }else {
            return redirect('login')->with('gagal','Username dan Password tidak ditemukan!');
        }
    }
}
