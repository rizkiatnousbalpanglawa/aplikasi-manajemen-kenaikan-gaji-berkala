<?php

namespace App\Http\Controllers;

use App\Daftargaji;
use App\Pegawai;
use Illuminate\Http\Request;

class DataPegawaiController extends Controller
{
    public function index()
    {
        $data['pegawai'] = Daftargaji::where('diteruskan','tim_penilai')->join('pegawais', 'daftargajis.pegawais_id', 'pegawais.id')
                            ->select('pegawais.id','pegawais.nama_pegawai')
                            ->get();
        $data['daftar-gaji'] = Daftargaji::where('diteruskan','tim_penilai')->join('pegawais', 'daftargajis.pegawais_id', 'pegawais.id')
                            ->select('daftargajis.id','pegawais.nama_pegawai','berkala_gaji','jumlah_hari_kerja','jumlah_presensi','jumlah_izin','jumlah_cuti','nilai_tanggung_jawab','nilai_loyalitas','nilai_kerjasama','nilai_inovasi','diteruskan')
                            ->get();
        return view('tim_penilai.data-pegawai.index', compact('data'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'nilai_tanggung_jawab' => 'required',
            'nilai_kerjasama' => 'required',
            'nilai_loyalitas' => 'required',
            'nilai_inovasi' => 'required'
        ]);
        Daftargaji::where('id',$request->daftargajis_id)->update($data);
        return back();
    }
}
