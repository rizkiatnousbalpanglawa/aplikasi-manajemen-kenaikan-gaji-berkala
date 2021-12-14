@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <h1 class="mt-2">Satuan Kerja</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Satuan Kerja</li>
    </ol>

    <div class="text-end mb-2">
        <a href="" class="btn btn-green" data-bs-target="#tambahData" data-bs-toggle="modal">
            <i class="fas fa-plus"></i>
            Tambah
        </a>
    </div>

    <table id="datatablesSimple" class="bg-white">
        <thead>
            <tr>
                <th>Nama Satuan Kerja</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($satuankerja as $item)
            <tr>
                <td>{{ $item->nama_satuan_kerja }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->no_telp }}</td>
                <td>
                    <form action="{{ route('satuan-kerja.hapus',$item->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Data? ')">
                            <i class="fas fa-trash"></i>
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="tambahData">
    <form action="{{ route('satuan-kerja.store') }}" method="post">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Satuan Kerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nama Satuan Kerja</label>
                        <input type="text" name="nama_satuan_kerja" class="form-control" id="" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="" required>
                    </div>
                    <div class="mb-3">
                        <label for="">No Telp</label>
                        <input type="text" name="no_telp" class="form-control" id="" required>

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