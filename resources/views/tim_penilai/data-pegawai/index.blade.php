@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <h1 class="mt-2">Form Penilaian Pegawai</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Form Penilaian Pegawai</li>
    </ol>

    <div class="text-end mb-2">
        {{-- <a href="" class="btn btn-green" data-bs-target="#tambahData" data-bs-toggle="modal">
            <i class="fas fa-plus"></i>
            Tambah
        </a> --}}
    </div>

    <div class="table-responsive">
        <table id="datatablesSimple" class="bg-white">
            <thead>
                <tr>
                    <th class="visually-hidden">Id</th>
                    <th>Nama Pegawai</th>
                    {{-- <th>Jabatan Lama</th> --}}
                    {{-- <th>Jabatan Baru</th> --}}
                    {{-- <th>Gaji Pokok</th> --}}
                    {{-- <th>Tunjangan Jabatan</th> --}}
                    {{-- <th>Tunjangan Kesejahteraan Keluarga</th> --}}
                    {{-- <th>Total Gaji</th> --}}
                    {{-- <th>Tanggal Masuk</th> --}}
                    <th>Tahun Kenaikan</th>
                    <th>Jumlah Hari Kerja</th>
                    <th>Jumlah Presensi</th>
                    <th>Jumlah Izin</th>
                    <th>Jumlah Cuti</th>
                    <th>Nilai Tanggung Jawab</th>
                    <th>Nilai Loyalitas</th>
                    <th>Nilai Kerjasama</th>
                    <th>Nilai Inovasi</th>
                    {{-- <th>Password</th> --}}
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['daftar-gaji'] as $item)
                <tr>
                    <td id="row_daftargajis_id" class="visually-hidden">{{ $item->id }}</td>
                    <td id="row_nama_pegawai">{{ $item->nama_pegawai }}</td>
                    {{-- <td>{{ $item->jabatan_lama }}</td> --}}
                    {{-- <td>{{ $item->jabatan_baru }}</td> --}}
                    {{-- <td>{{ $item->gaji_pokok }}</td> --}}
                    {{-- <td>{{ $item->tunjangan_jabatan }}</td> --}}
                    {{-- <td>{{ $item->tunjangan_kesejahteraan_keluarga }}</td> --}}
                    {{-- <td>{{ $item->total_gaji }}</td> --}}
                    {{-- <td>{{ date('d M Y', strtotime($item->tanggal_masuk)) }}</td> --}}
                    <td id="row_tahun">{{ date('Y',strtotime($item->berkala_gaji)) }}</td>
                    <td>{{ $item->jumlah_hari_kerja }}</td>
                    <td>{{ $item->jumlah_presensi }}</td>
                    <td>{{ $item->jumlah_izin }}</td>
                    <td>{{ $item->jumlah_cuti }}</td>
                    <td>
                        {{-- {{ ($item->nilai_tanggung_jawab == null)? '-' : $item->nilai_tanggung_jawab }} --}}
                        @if ($item->nilai_tanggung_jawab == 1)
                            Cukup
                        @elseif($item->nilai_tanggung_jawab == 2)
                            Baik
                        @elseif($item->nilai_tanggung_jawab == 3)
                            Sangat Baik
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        {{-- {{ ($item->nilai_loyalitas == null)? '-' : $item->nilai_loyalitas }} --}}
                        @if ($item->nilai_loyalitas == 1)
                            Cukup
                        @elseif($item->nilai_loyalitas == 2)
                            Baik
                        @elseif($item->nilai_loyalitas == 3)
                            Sangat Baik
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        {{-- {{ ($item->nilai_kerjasama == null)? '-' : $item->nilai_kerjasama }} --}}
                        @if ($item->nilai_kerjasama == 1)
                            Cukup
                        @elseif($item->nilai_kerjasama == 2)
                            Baik
                        @elseif($item->nilai_kerjasama == 3)
                            Sangat Baik
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        {{-- {{ ($item->nilai_inovasi == null)? '-' : $item->nilai_inovasi }} --}}
                        @if ($item->nilai_inovasi == 1)
                            Cukup
                        @elseif($item->nilai_inovasi == 2)
                            Baik
                        @elseif($item->nilai_inovasi == 3)
                            Sangat Baik
                        @else
                            -
                        @endif
                    </td>
                    {{-- <td></td> --}}
                    <td>
                        @if ($item->nilai_loyalitas == null && $item->diteruskan == 'tim_penilai')
                        <button type="button" class="btn btn-primary btn-sm isiform">
                            Isi Form
                        </button>
                        @else
                            -
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<div class="modal fade" id="isiform">
    <form action="{{ route('data-karyawan.update') }}" method="post">
        @csrf
        @method('patch')
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Input Form Penilaian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <div class="mb-3"> --}}
                        {{-- <label for="">Nama Pegawai</label>
                        <select name="pegawais_id" id="" class="form-select" required autocomplete="off">
                            <option value="">Pilih</option>
                            @foreach ($data['pegawai'] as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_pegawai }}</option>
                            @endforeach
                        </select> --}}
                    {{-- </div> --}}
                    <input type="hidden" name="daftargajis_id" id="modal_id">

                    <div class="mb-3">
                        <label for="">Nama Pegawai</label>
                        <input type="text" id="modal_nama_pegawai" class="form-control" readonly>

                    </div>
                    <div class="mb-3">
                        <label for="">Tahun Kenaikan</label>
                        <input type="text" id="modal_tahun" class="form-control" readonly>

                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="">Tanggung Jawab</label>
                                {{-- <input type="radio" name="nilai_tanggung_jawab" id="tanggung_jawab_sangat_baik" value="3"> --}}
                                {{-- <label for="tanggung_jawab_sangat_baik">Selalu mengerjakan tugas yang diberikan, mengumpulkan tepat waktu, serta mengerjakan sesuai dengan instruksi yang diberikan</label> --}}
                                <select name="nilai_tanggung_jawab" id="" class="form-select">
                                    <option value="3">Selalu mengerjakan tugas yang diberikan, mengumpulkan tepat waktu, serta mengerjakan sesuai dengan instruksi yang diberikan</option>
                                    <option value="2" selected>Selalu mengerjakan tugas yang diberikan dengan tepat waktu meskipun sesekali melakukan kesalahan </option>
                                    <option value="1">Mengerjakan tugas yang diberikan terkadang terlambat dan kurang sesuai dengan instruksi yang diberikan namun masih dalam batas yang wajar</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Kerjasama</label>
                                <select name="nilai_kerjasama" id="" class="form-select">
                                    <option value="3">Mampu berkoordinasi dan berkomunikasi dengan berbagai pihak, serta menghargai pendapat dan masukan orang secara konsisten</option>
                                    <option value="2" selected>Mengetahui tugas orang lain yang berhubungan dengan tugasnya serta bersedia mempertimbangkan usulan dari orang lain</option>
                                    <option value="1">Mengetahui secara garis besar tugas orang lain yang berhubungan dengan tugasnya dan sesekali harus diyakinkan terlebih dahulu untuk menyesuaikan pendapat</option>
                                </select>
                            </div>


                        </div>
                        <div class="col-6">

                            <div class="mb-3">
                                <label for="">Loyalitas</label>
                                <select name="nilai_loyalitas" id="" class="form-select">
                                    <option value="3">Selalu menaati aturan-aturan dan prosedur kerja serta menepati instruksi yang diberikan atasan</option>
                                    <option value="2" selected>Sesekali tidak menaati aturan-aturan dan prosedur kerja serta menepati instruksi yang diberikan atasan</option>
                                    <option value="1">Tidak menaati aturan-aturan dan prosedur kerja serta serta menepati instruksi yang diberikan atasan namun masih dalam batas yang kewajaran</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Inovasi</label>
                                <select name="nilai_inovasi" id="" class="form-select">
                                    <option value="3">Menciptakan dan mengimplementasikan hal baru ditingkat organisasi yang menyebabkan institusi memiliki kinerja yang lebih baik</option>
                                    <option value="2" selected>Menciptakan dan mengimplementasikan hal baru ditingkat satuan kerja sehingga meningkatkan performa atau kinerja satuan kerja</option>
                                    <option value="1">Menciptakan dan mengimplementasikan hal baru ditingkat divisi/bidang sehingga meningkatkan performa atau kinerja divisi/bidang</option>
                                </select>
                            </div>

                        </div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function (){
        $('.isiform').click(function(){
      
            var $row = $(this).closest('tr');
            var nama_pegawai =  $row.find('#row_nama_pegawai').text();
            var daftargajis_id = $row.find('#row_daftargajis_id').text();
            var tahun =  $row.find('#row_tahun').text();
       
            $('#modal_nama_pegawai').val(nama_pegawai);
            $('#modal_tahun').val(tahun);
            $('#modal_id').val(daftargajis_id);
      
            $('#isiform').modal('toggle');
        });
    });
</script>
@endsection