<?php

namespace App\Http\Controllers;

use App\Daftargaji;
use App\Pegawai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        $data['jumlah-pegawai'] = count($pegawai);

        $pegawai = Daftargaji::where('disetujui','ditolak')->get();
        $data['kgb-ditolak'] = count($pegawai);

        $pegawai = Daftargaji::where('disetujui','sudah')->get();
        $data['kgb-diterima'] = count($pegawai);
        
        $jumlah_detik_per_tahun = 86400*365;



        // $naik_gaji_bulan_ini = Pegawai::where();

        return view('dashboard.index',compact('data'));
    }
}
