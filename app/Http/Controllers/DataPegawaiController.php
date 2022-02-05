<?php

namespace App\Http\Controllers;

use App\Daftargaji;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class DataPegawaiController extends Controller
{
    public function index()
    {
        $data['pegawai'] = Daftargaji::where('diteruskan', 'tim_penilai')->join('pegawais', 'daftargajis.pegawais_id', 'pegawais.id')
            ->select('pegawais.id', 'pegawais.nama_pegawai')
            ->get();
        $data['daftar-gaji'] = Daftargaji::where('diteruskan', 'tim_penilai')->join('pegawais', 'daftargajis.pegawais_id', 'pegawais.id')
            ->select('daftargajis.id', 'pegawais.nama_pegawai', 'berkala_gaji', 'jumlah_hari_kerja', 'jumlah_presensi', 'jumlah_izin', 'jumlah_cuti', 'nilai_tanggung_jawab', 'nilai_loyalitas', 'nilai_kerjasama', 'nilai_inovasi', 'diteruskan')
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
        Daftargaji::where('id', $request->daftargajis_id)->update($data);

        // menentukan kelayakan
        $daftargaji = Daftargaji::where('id', $request->daftargajis_id)->first();
        $nilai_tanggung_jawab = $daftargaji->nilai_tanggung_jawab / 3 * 100 * 20 / 100;
        $nilai_kerjasama = $daftargaji->nilai_kerjasama / 3 * 100 * 20 / 100;
        $nilai_loyalitas = $daftargaji->nilai_loyalitas / 3 * 100 * 20 / 100;
        $nilai_inovasi = $daftargaji->nilai_inovasi / 3 * 100 * 20 / 100;
        $nilai_hadir = (($daftargaji->jumlah_presensi + $daftargaji->jumlah_cuti) / $daftargaji->jumlah_hari_kerja * 100) * 20 / 100;

        $totalnilai = $nilai_tanggung_jawab + $nilai_kerjasama + $nilai_loyalitas + $nilai_inovasi + $nilai_hadir;

        if ($daftargaji->jumlah_cuti == 0) {
            $totalnilai = $totalnilai + 10;
        }

        if ($nilai_tanggung_jawab == 0) {
            $totalnilai = 0;
        }

        if ($totalnilai > 100) {
            $totalnilai = 100;
        }

        if ($totalnilai > 79) :
            $status = "Selamat! Anda Layak Menerima Kenaikan Gaji";
        elseif ($totalnilai > 0) :
            $status = "Maaf! Anda Tidak Layak Menerima Kenaikan Gaji";
        else :
            $status = "Maaf! Data Anda Tidak Bisa Dinilai";
        endif;

        // Mencari email dan nama dari pegawai
           $pegawai = Pegawai::where('id',$daftargaji->pegawais_id )->first();
            $email = $pegawai->users->email;

            $namaPegawai = $pegawai->nama_pegawai;



        Mail::to($email)->send(new MailNotify($namaPegawai, $status));

        return back();
    }
}
