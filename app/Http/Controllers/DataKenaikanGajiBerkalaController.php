<?php

namespace App\Http\Controllers;

use App\Daftargaji;
use App\Pegawai;
use Illuminate\Http\Request;

class DataKenaikanGajiBerkalaController extends Controller
{
    public function index()
    {
        $data['pegawai'] = Pegawai::get();
        // $data['daftar-gaji'] = Daftargaji::join('pegawais', 'daftargajis.pegawais_id', 'pegawais.id')
        //     ->select('daftargajis.id', 'pegawais.nama_pegawai', 'satuankerjas.nama_satuan_kerja', 'gaji_pokok', 'tunjangan_jabatan', 'tunjangan_kesejahteraan_keluarga', 'total_gaji', 'berkala_gaji', 'diteruskan')
        //     ->join('satuankerjas', 'pegawais.satuankerjas_id', 'satuankerjas.id')
        //     ->get();

        $data['daftar-gaji'] = Daftargaji::all();
        return view('admin/data-kenaikan-gaji-berkala.index', compact('data'));
    }

    public function setuju(Daftargaji $daftargaji)
    {

        $data['diteruskan'] = 'sudah';

        $daftargaji->update($data);

        return redirect(route('data-kenaikan-gaji-berkala'));
    }
}
