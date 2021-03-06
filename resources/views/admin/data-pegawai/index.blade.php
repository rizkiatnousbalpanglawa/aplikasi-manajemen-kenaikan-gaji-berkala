@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <h1 class="mt-2">Data Pegawai</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Data Pegawai</li>
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
                <th>Nama Pegawai</th>
                <th>Email</th>
                <th>Jabatan</th>
                <th>Satuan Kerja</th>
                <th>No SK</th>
                <th>Username</th>
                {{-- <th>Password</th> --}}
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['pegawai'] as $item)
            <tr>
                <td>{{ $item->nama_pegawai }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ $item->nama_satuan_kerja }}</td>
                <td>{{ $item->no_sk }}</td>
                <td>{{ $item->username }}</td>
                {{-- <td></td> --}}
                <td>
                    <form action="" method="post">
                        @method('delete')
                        @csrf
                        <input type="hidden" name="pegawai_id" value="{{ $item->pegawai_id }}">
                        <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus?')">
                            <i class="fas fa-times"></i>
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
    <form action="{{ route('pegawai.store') }}" method="post">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Petugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nama Pegawai</label>
                        <input type="text" name="nama_pegawai" class="form-control" id="" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" id="" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="">Satuan Kerja</label>
                        <select name="satuankerjas_id" id="" class="form-select" required autocomplete="off">
                            <option value="">Pilih</option>
                            @foreach ($data['satuankerja'] as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_satuan_kerja }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">No. SK</label>
                        <input type="text" name="no_sk" class="form-control" id="" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="">email</label>
                        <input type="email" name="email" class="form-control" id="" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" id="" required autocomplete="off">
                        <p class="small text-muted">*Password petugas sama dengan username</p>
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