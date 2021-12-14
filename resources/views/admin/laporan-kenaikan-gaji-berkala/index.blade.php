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
                <th>Gaji Pokok Baru</th>
                <th>Tunjangan Jabatan</th>
                <th>Tunjangan Kesejahteraan Keluarga</th>
                <th>Total Gaji</th>
                <th>Berkala Gaji</th>
                <th>Tahun</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['daftar-gaji'] as $item)
            <tr>
                <td>{{ $item->nama_pegawai }}</td>
                <td>{{ $item->nama_satuan_kerja }}</td>
                <td>{{ number_format(($item->gaji_pokok) + 50000) }}</td>
                <td>{{ number_format($item->tunjangan_jabatan) }}</td>
                <td>{{ number_format($item->tunjangan_kesejahteraan_keluarga) }}</td>
                <td>{{ number_format($item->total_gaji) }}</td>
                <td>{{ date('M Y',strtotime($item->berkala_gaji)) }}</td>
                <td>
                    {{ date('Y',strtotime($item->berkala_gaji)) }}
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