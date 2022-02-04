<?php

namespace App\Http\Controllers;

use App\Daftargaji;
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
                            ->select('pegawais.id as pegawai_id','users.id as user_id','nama_pegawai','jabatan','nama_satuan_kerja','no_sk','username','email')
                            ->get();
        return view('admin.data-pegawai.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pegawai' => ['required'],
            'jabatan' => ['required'],
            'satuankerjas_id' => '',
            'no_sk' => '',
            'username' => ['required', 'unique:users', 'max:255'],
            'email' => '',
            'user_id' => ''
        ]);

        $user = new User;

        $user->name = $request->nama_pegawai;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($user->username);

        $user->save();
        $id = $user->id;

        $validatedData['user_id'] = $id;
     
        Pegawai::create($validatedData);
        return redirect(route('pegawai'));
    }

    public function delete(Request $request)
    {
        Pegawai::where('id',$request->pegawai_id)->delete();
        User::where('id',$request->user_id)->delete();
        Daftargaji::where('pegawais_id',$request->pegawai_id)->delete();
        return back();
    }
}
