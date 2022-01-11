@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <h1 class="mt-2">Data Kenaikan Gaji Berkala</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Data Kenaikan Gaji Berkala</li>
    </ol>

    <table id="datatablesSimple" class="bg-white">
        <thead>
            <tr>
                <th>Nama Pegawai</th>
                <th>Satuan Kerja</th>
                <th>Total Gaji</th>
                <th>Total Gaji diusulkan</th>
                <th class="visually-hidden">Nilai Tanggung Jawab</th>
                <th class="visually-hidden">Nilai Kerjasama</th>
                <th class="visually-hidden">Nilai Loyalitas</th>
                <th class="visually-hidden">Nilai Inovasi</th>
                <th class="visually-hidden">Jumlah Cuti</th>
                <th class="visually-hidden">Jumlah Izin</th>
                <th class="visually-hidden">Jumlah Hari Kerja</th>
                <th class="visually-hidden">Jumlah Presensi</th>
                <th>Total Penilaian</th>
                <th>Berkala Gaji</th>
                <th>Status (Kelayakan)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['daftar-gaji'] as $item)
            <tr>
                <td>{{ $item->pegawai->nama_pegawai }}</td>
                <td>{{ $item->pegawai->satuanKerja->nama_satuan_kerja }}</td>
                <td>{{ number_format($item->total_gaji) }}</td>
                <td>{{ number_format($item->total_gaji + 50000) }}</td>
                <td class="visually-hidden" id="row_nilai_tanggung_jawab">
                    {{ number_format($item->nilai_tanggung_jawab/3*100) }}
                </td>
                <td class="visually-hidden" id="row_nilai_kerjasama">
                    {{ number_format($item->nilai_kerjasama/3*100) }}
                </td>
                <td class="visually-hidden" id="row_nilai_loyalitas">
                    {{ number_format($item->nilai_loyalitas/3*100) }}
                </td>
                <td class="visually-hidden" id="row_nilai_inovasi">
                    {{ number_format($item->nilai_inovasi/3*100) }}
                </td>
                <td class="visually-hidden" id="row_jumlah_cuti">
                    {{ number_format($item->jumlah_cuti) }}
                </td>
                <td class="visually-hidden" id="row_jumlah_izin">
                    {{ number_format($item->jumlah_izin) }}
                </td>
                <td class="visually-hidden" id="row_jumlah_hari_kerja">
                    {{ number_format($item->jumlah_hari_kerja) }}
                </td>
                <td class="visually-hidden" id="row_jumlah_presensi">
                    {{ number_format(($item->jumlah_presensi+$item->jumlah_cuti)/$item->jumlah_hari_kerja*100) }}
                </td>
             
                    @php
                    $nilai_tanggung_jawab = $item->nilai_tanggung_jawab/3*100*20/100;
                    $nilai_kerjasama = $item->nilai_kerjasama/3*100*20/100;
                    $nilai_loyalitas = $item->nilai_loyalitas/3*100*20/100;
                    $nilai_inovasi = $item->nilai_inovasi/3*100*20/100;
                    $nilai_hadir = (($item->jumlah_presensi+$item->jumlah_cuti)/$item->jumlah_hari_kerja*100)*20/100;

                    $totalnilai = $nilai_tanggung_jawab+$nilai_kerjasama+$nilai_loyalitas+$nilai_inovasi+$nilai_hadir;

                    if ($item->jumlah_cuti == 0) {
                        $totalnilai = $totalnilai+10;
                    }

                    if ($nilai_tanggung_jawab == 0) {
                        $totalnilai = 0;
                    }

                    if ($totalnilai > 100) {
                        $totalnilai = 100;
                    }
                    @endphp
                <td id="row_total_penilaian">
                    {{ number_format($totalnilai) }}
                </td>
                <td>{{ date('M Y',strtotime($item->berkala_gaji)) }}</td>
                <td>
                    @if ($totalnilai > 79)
                        Layak
                    @elseif ($totalnilai > 0)
                        Tidak Layak
                        @else
                        Tidak Bisa Dinilai
                    @endif
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-info btn-sm me-2 btn-penilaian">
                            <i class="fas fa-list"></i>
                        </button>

                        {{-- @if ($item->disetujui == 'sudah' || $item->disetujui == 'ditolak')
                        -

                        @elseif($totalnilai < 80)
                        -
                        @else

                        <form action="{{ route('kenaikan-gaji.setuju',$item->id) }}" method="post" class="me-2">
                            @csrf
                            @method('patch')

                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-check"></i>
                            </button>
                        </form>

                        <form action="{{ route('kenaikan-gaji.batal',$item->id) }}" method="post">
                            @csrf
                            @method('patch')

                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                        @endif --}}
                    </div>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- modal show perhitungan --}}
<div class="modal fade" id="perhitungan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="">Nilai Tanggung Jawab</label>
                            <input type="text" readonly class="form-control" id="nilai_tanggung_jawab">
                        </div>
                        <div class="mb-3">
                            <label for="">Nilai Loyalitas</label>
                            <input type="text" readonly class="form-control" id="nilai_loyalitas">
                        </div>
                        <div class="mb-3">
                            <label for="">Jumlah Hari Kerja</label>
                            <input type="text" readonly class="form-control" id="jumlah_hari_kerja">
                        </div>
                        <div class="mb-3">
                            <label for="">Jumlah Izin</label>
                            <input type="text" readonly class="form-control" id="jumlah_izin">
                        </div>
                       
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="">Nilai Kerjasama</label>
                            <input type="text" readonly class="form-control" id="nilai_kerjasama">
                        </div>
                        <div class="mb-3">
                            <label for="">Nilai Inovasi</label>
                            <input type="text" readonly class="form-control" id="nilai_inovasi">
                        </div>
                        <div class="mb-3">
                            <label for="">Jumlah Presensi</label>
                            <input type="text" readonly class="form-control" id="jumlah_presensi">
                        </div>
                        <div class="mb-3">
                            <label for="">Jumlah Cuti</label>
                            <input type="text" readonly class="form-control" id="jumlah_cuti">
                        </div>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <label for="">Total Penilaian</label>
                    <input type="text" readonly class="form-control text-center" id="total_penilaian">
                </div>
            </div>
            <div class="modal-footer">
                <a href="" class="btn" data-bs-dismiss="modal">Close</a>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
   $(document).ready(function(){
        $('.btn-penilaian').click(function () {
            var $row = $(this).closest('tr');
            var nilai_tanggung_jawab = $row.find('#row_nilai_tanggung_jawab').text(),
                nilai_kerjasama = $row.find('#row_nilai_kerjasama').text(),
                nilai_loyalitas = $row.find('#row_nilai_loyalitas').text(),
                nilai_inovasi = $row.find('#row_nilai_inovasi').text(),
                jumlah_cuti = $row.find('#row_jumlah_cuti').text(),
                jumlah_hari_kerja = $row.find('#row_jumlah_hari_kerja').text(),
                jumlah_presensi = $row.find('#row_jumlah_presensi').text(),
                jumlah_izin = $row.find('#row_jumlah_izin').text();
                total_penilaian = $row.find('#row_total_penilaian').text();

            $('#nilai_tanggung_jawab').val(nilai_tanggung_jawab);
            $('#nilai_kerjasama').val(nilai_kerjasama);
            $('#nilai_loyalitas').val(nilai_loyalitas);
            $('#nilai_inovasi').val(nilai_inovasi);
            $('#jumlah_hari_kerja').val(jumlah_hari_kerja);
            $('#jumlah_presensi').val(jumlah_presensi);
            $('#jumlah_izin').val(jumlah_izin);
            $('#jumlah_cuti').val(jumlah_cuti);
            $('#total_penilaian').val(total_penilaian);

            $('#perhitungan').modal('toggle');

                // alert(nilai_tanggung_jawab);
        });

       
   });
</script>

@endsection