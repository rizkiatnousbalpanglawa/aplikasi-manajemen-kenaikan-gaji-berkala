<?php

namespace App\Http\Controllers\Admin;

use App\Daftargaji;
use App\Http\Controllers\Controller;
use App\Pegawai;
use Illuminate\Http\Request;

class KenaikanGajiController extends Controller
{
    public function index()
    {
        $data['pegawai'] = Pegawai::get();
        // $data['daftar-gaji'] = Daftargaji::join('pegawais','daftargajis.pegawais_id','pegawais.id')
        //                         ->select('daftargajis.id','pegawais.nama_pegawai','satuankerjas.nama_satuan_kerja','gaji_pokok','tunjangan_jabatan','tunjangan_kesejahteraan_keluarga','total_gaji','berkala_gaji','disetujui')
        //                         ->join('satuankerjas','pegawais.satuankerjas_id','satuankerjas.id')
        //                         ->where('daftargajis.diteruskan','sudah')
        //                         ->get();

        $data['daftar-gaji'] = Daftargaji::all();
        return view('ketua/data-kenaikan-gaji-berkala.index',compact('data'));
    }

    public function setuju(Daftargaji $daftargaji)
    {

        $data['disetujui'] = 'sudah';

        $daftargaji->update($data);

        return redirect(route('kenaikan-gaji-berkala'));
    }

    public function batal(Daftargaji $daftargaji)
    {

        $data['disetujui'] = 'ditolak';

        $daftargaji->update($data);

        return redirect(route('kenaikan-gaji-berkala'));
    }
}
