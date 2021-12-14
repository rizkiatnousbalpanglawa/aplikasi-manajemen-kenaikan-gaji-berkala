@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <h1 class="mt-2">Daftar Gaji</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar Gaji</li>
    </ol>

    <div class="text-end mb-2">
        <a href="" class="btn btn-green" data-bs-target="#tambahData" data-bs-toggle="modal">
            <i class="fas fa-plus"></i>
            Tambah
        </a>
    </div>

    <div class="table-responsive">
        <table id="datatablesSimple" class="bg-white">
            <thead>
                <tr>
                    <th>Nama Pegawai</th>
                    <th>Jabatan Lama</th>
                    <th>Jabatan Baru</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan Jabatan</th>
                    <th>Tunjangan Kesejahteraan Keluarga</th>
                    <th>Total Gaji</th>
                    <th>Tanggal Masuk</th>
                    <th>Berkala Gaji</th>
                    <th>Jumlah Hari Kerja</th>
                    <th>Jumlah Presensi</th>
                    <th>Jumlah Izin</th>
                    <th>Jumlah Cuti</th>
                    {{-- <th>Password</th> --}}
                    {{-- <th>#</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($data['daftar-gaji'] as $item)
                <tr>
                    <td>{{ $item->nama_pegawai }}</td>
                    <td>{{ $item->jabatan_lama }}</td>
                    <td>{{ $item->jabatan_baru }}</td>
                    <td>{{ $item->gaji_pokok }}</td>
                    <td>{{ $item->tunjangan_jabatan }}</td>
                    <td>{{ $item->tunjangan_kesejahteraan_keluarga }}</td>
                    <td>{{ $item->total_gaji }}</td>
                    <td>{{ date('d M Y', strtotime($item->tanggal_masuk)) }}</td>
                    <td>{{ date('M Y',strtotime($item->berkala_gaji)) }}</td>
                    <td>{{ $item->jumlah_hari_kerja }}</td>
                    <td>{{ $item->jumlah_presensi }}</td>
                    <td>{{ $item->jumlah_izin }}</td>
                    <td>{{ $item->jumlah_cuti }}</td>
                    {{-- <td></td> --}}
                    {{-- <td></td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<div class="modal fade" id="tambahData">
    <form action="{{ route('daftar-gaji.store') }}" method="post">
        @csrf
        <div class="modal-dialog modal-lg">
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

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="">Jabatan Lama</label>
                                <input type="text" name="jabatan_lama" class="form-control" id="" required
                                    autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="">Gaji Pokok</label>
                                <input type="number" name="gaji_pokok" class="form-control" id="" required
                                    autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="">Tunjangan Jabatan</label>
                                <input type="number" name="tunjangan_jabatan" class="form-control" id="" required
                                    autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="">Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" class="form-control" id="" required
                                    autocomplete="off">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="">Jumlah Hari Kerja</label>
                                        <input type="number" name="jumlah_hari_kerja" class="form-control" id="" required
                                            autocomplete="off" max="288">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="">Jumlah Presensi</label>
                                        <input type="number" name="jumlah_presensi" class="form-control" id="" required
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="">Tanggung Jawab</label>
                                <select name="nilai_tanggung_jawab" id="" class="form-select">
                                    <option value="3">Sangat Baik</option>
                                    <option value="2" selected>Baik</option>
                                    <option value="1">Cukup</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Kerjasama</label>
                                <select name="nilai_kerjasama" id="" class="form-select">
                                    <option value="3">Sangat Baik</option>
                                    <option value="2" selected>Baik</option>
                                    <option value="1">Cukup</option>
                                </select>
                            </div>


                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="">Jabatan Baru</label>
                                <input type="text" name="jabatan_baru" class="form-control" id="" required
                                    autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="">Kesejahteraan Keluarga</label>
                                <input type="number" name="tunjangan_kesejahteraan_keluarga" class="form-control" id=""
                                    required autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="">Total Gaji</label>
                                <input type="number" name="total_gaji" class="form-control" id="" required
                                    autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="">Berkala Gaji</label>
                                <input type="date" name="berkala_gaji" class="form-control" id="" required
                                    autocomplete="off">
                            </div>
                          
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="">Jumlah Cuti</label>
                                        <input type="number" name="jumlah_cuti" class="form-control" id="" required
                                            autocomplete="off" max="288">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="">Jumlah Izin</label>
                                        <input type="number" name="jumlah_izin" class="form-control" id="" required
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="">Loyalitas</label>
                                <select name="nilai_loyalitas" id="" class="form-select">
                                    <option value="3">Sangat Baik</option>
                                    <option value="2" selected>Baik</option>
                                    <option value="1">Cukup</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Inovasi</label>
                                <select name="nilai_inovasi" id="" class="form-select">
                                    <option value="3">Sangat Baik</option>
                                    <option value="2" selected>Baik</option>
                                    <option value="1">Cukup</option>
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
@endsection