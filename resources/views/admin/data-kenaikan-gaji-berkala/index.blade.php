@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <h1 class="mt-2">Data Kenaikan Gaji Berkala</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Data Kenaikan Gaji Berkala</li>
    </ol>

    {{-- <div class="text-end mb-2">
        <a href="" class="btn btn-green" data-bs-target="#tambahData" data-bs-toggle="modal">
            <i class="fas fa-plus"></i>
            Tambah
        </a>
    </div> --}}

    <table id="datatablesSimple" class="bg-white">
        <thead>
            <tr>
                <th>Nama Pegawai</th>
                <th>Satuan Kerja</th>
                <th>Nilai Tanggung Jawab</th>
                <th>Nilai Kerjasama</th>
                <th>Nilai Loyalitas</th>
                <th>Nilai Inovasi</th>
                <th>Jumlah Hadir</th>
                <th>Jumlah Cuti</th>
                <th>Jumlah Izin</th>
                <th>Total Gaji saat Ini</th>
                <th>Total Gaji yang diusulkan</th>
                <th>Berkala Gaji</th>
                <th>Status</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['daftar-gaji'] as $item)
            <tr>
                <td>{{ $item->pegawai->nama_pegawai }}</td>
                <td>{{ $item->pegawai->satuanKerja->nama_satuan_kerja }}</td>
                <td>
                    @if ($item->nilai_tanggung_jawab == 3)
                        Sangat Baik
                    @elseif($item->nilai_tanggung_jawab == 2)
                        Baik
                    @else
                        Cukup
                    @endif
                </td>
                <td>
                    @if ($item->nilai_kerjasama == 3)
                        Sangat Baik
                    @elseif($item->nilai_kerjasama == 2)
                        Baik
                    @else
                        Cukup
                    @endif
                </td>
                <td>
                    @if ($item->nilai_loyalitas == 3)
                        Sangat Baik
                    @elseif($item->nilai_loyalitas == 2)
                        Baik
                    @else
                        Cukup
                    @endif
                </td>
                <td>
                    @if ($item->nilai_inovasi == 3)
                        Sangat Baik
                    @elseif($item->nilai_inovasi == 2)
                        Baik
                    @else
                        Cukup
                    @endif
                </td>
                <td>{{ $item->jumlah_presensi }} kali</td>
                <td>{{ $item->jumlah_cuti }} kali</td>
                <td>{{ $item->jumlah_izin }} kali</td>
                <td>{{ number_format($item->total_gaji) }}</td>
                <td>{{ number_format($item->total_gaji + 50000) }}</td>
                <td>{{ date('M Y',strtotime($item->berkala_gaji)) }}</td>
                <td>
                    @if ($item->disetujui == "sudah")
                        Disetujui untuk naik gaji
                    @else
                        Belum disetujui untuk naik gaji
                    @endif
                </td>
                <td>
                    @if ($item->diteruskan == "sudah")
                   -
                    @else
                    <form action="{{ route('kenaikan-gaji-berkala.teruskan',$item->id) }}" method="post">
                        @csrf
                        @method('patch')
                       
                        <button class="btn btn-primary btn-sm">
                            Teruskan
                        </button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="tambahData">
    <form action="{{ route('daftar-gaji.store') }}" method="post">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Daftar Gaji</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nama Pegawai</label>
                        <select name="pegawais_id" id="" class="form-select" required autocomplete="off">
                            <option value="">Pilih</option>
                            @foreach ($data['pegawai'] as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_pegawai }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Jabatan Lama</label>
                        <input type="text" name="jabatan_lama" class="form-control" id="" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="">Jabatan Baru</label>
                        <input type="text" name="jabatan_baru" class="form-control" id="" required autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="">Gaji Pokok</label>
                        <input type="text" name="gaji_pokok" class="form-control" id="" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="">Tunjangan Jabatan</label>
                        <input type="text" name="tunjangan_jabatan" class="form-control" id="" required
                            autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="">Kesejahteraan Keluarga</label>
                        <input type="text" name="tunjangan_kesejahteraan_keluarga" class="form-control" id="" required
                            autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="">Total Gaji</label>
                        <input type="text" name="total_gaji" class="form-control" id="" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="">Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" class="form-control" id="" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="">Berkala Gaji</label>
                        <input type="date" name="berkala_gaji" class="form-control" id="" required autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="text-decoration-none text-dark" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        Keluar
                    </a>
                    <button type="submit" class="btn btn-green">
                        <i class="fas fa-plus"></i>
                        Tambah
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection