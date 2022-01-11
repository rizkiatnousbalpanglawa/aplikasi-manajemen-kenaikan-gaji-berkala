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
        $data['daftar-gaji'] = Daftargaji::join('pegawais', 'daftargajis.pegawais_id', 'pegawais.id')
            ->get();
        return view('admin.daftar-gaji.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $tahun_gaji_berkala = date('Y', strtotime($request->berkala_gaji));
        $daftargajibedaorang = Daftargaji::where('pegawais_id',$request->pegawais_id)->whereYear('berkala_gaji', $tahun_gaji_berkala)->first();
        // $daftargajisamaorang = Daftargaji::whereYear('tanggal_masuk',$request->pegawais_id)->whereYear('berkala_gaji', $tahun_gaji_berkala)->first();
        $data['diteruskan'] = 'belum';

        if ($daftargajibedaorang) {
            $data['gaji_pokok'] = 0;
            $data['tunjangan_jabatan'] = 0;
            $data['tunjangan_kesejahteraan_keluarga'] = 0;
            $data['total_gaji'] = 0;
        } elseif (date('Y',strtotime($request->tanggal_masuk)) == date('Y',strtotime($request->berkala_gaji))) {
            $data['gaji_pokok'] = 0;
            $data['tunjangan_jabatan'] = 0;
            $data['tunjangan_kesejahteraan_keluarga'] = 0;
            $data['total_gaji'] = 0;
        }
        Daftargaji::create($data);
        return redirect(route('daftar-gaji'));
    }
}
