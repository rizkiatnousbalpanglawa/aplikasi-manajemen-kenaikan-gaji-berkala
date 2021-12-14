<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Satuankerja;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index()
    {
        $data['satuankerja'] = Satuankerja::all();
        $data['pegawai'] = Pegawai::join('users','pegawais.user_id','users.id')
                            ->join('satuankerjas','pegawais.satuankerjas_id','satuankerjas.id')
                            ->get();
        return view('admin/data-pegawai.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pegawai' => ['required'],
            'jabatan' => ['required'],
            'satuankerjas_id' => '',
            'no_sk' => '',
            'username' => ['required', 'unique:users', 'max:255'],
            'user_id' => ''
        ]);

        $user = new User;

        $user->name = $request->nama_pegawai;
        $user->username = $request->username;
        $user->password = Hash::make($user->username);

        $user->save();
        $id = $user->id;

        $validatedData['user_id'] = $id;
     
        Pegawai::create($validatedData);
        return redirect(route('pegawai'));
    }
}
