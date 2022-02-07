<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Pegawai;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::join('satuankerjas', 'pegawais.satuankerjas_id', 'satuankerjas.id')
            ->select('pegawais.id as pegawai_id', 'pegawais.jabatan', 'satuankerjas.nama_satuan_kerja', 'pegawais.no_sk', 'pegawais.nama_pegawai')
            ->where('user_id', Auth::user()->id)->get();

        // dd($pegawai);
        return view('pegawai.profil-pegawai.index', compact('pegawai'));
    }

    public function update(Pegawai $pegawai)
    {
        $data = request()->all();

        $pegawai->update($data);

        if ($data['password'] != null) {
            $user = User::find($pegawai->user_id);

            $password['password'] = Hash::make($data['password']);

            $user->update($password);

        }

        // return $user;

        return redirect(route('profil-pegawai'))->with('sukses','Profil berhasil di-update!');
    }
}
