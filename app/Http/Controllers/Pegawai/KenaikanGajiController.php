<?php

namespace App\Http\Controllers\Pegawai;

use App\Daftargaji;
use App\Http\Controllers\Controller;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KenaikanGajiController extends Controller
{
    public function index()
    {
        $data['pegawai'] = Pegawai::where('user_id',Auth::user()->id)
                            ->get();
                            // return $data['pegawai'][0]->id;
        $data['daftar-gaji'] = Daftargaji::
                                where('pegawais_id',$data['pegawai'][0]->id)
                                ->get();
        return view('pegawai.data-kenaikan-gaji-berkala.index',compact('data')); 
    }
}
