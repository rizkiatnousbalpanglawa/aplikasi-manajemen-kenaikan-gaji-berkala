<?php

namespace App\Http\Controllers;

use App\Daftargaji;
use App\Pegawai;
use Illuminate\Http\Request;

class DaftargajiController extends Controller
{
    public function index()
    {
        $data['pegawai'] = Pegawai::get();
        $data['daftar-gaji'] = Daftargaji::join('pegawais','daftargajis.pegawais_id','pegawais.id')
                                ->get();
        return view('admin/daftar-gaji.index',compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['diteruskan'] = 'sudah';
        Daftargaji::create($data);
        // return $data;
        return redirect(route('daftar-gaji'));
    }

    
}
