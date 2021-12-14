@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <h1 class="mt-2">Profil Pegawai</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Profil Pegawai</li>
    </ol>

    @if (session()->has('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> {{ session()->get('sukses') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
    @endif

    <form action="{{ route('profil-pegawai.update',$pegawai[0]->pegawai_id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Nama Pegawai</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="" value="{{ $pegawai[0]->nama_pegawai }}" name="nama_pegawai">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Jabatan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="" value="{{ $pegawai[0]->jabatan }}" name="jabatan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Satuan Kerja</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="" value="{{ $pegawai[0]->nama_satuan_kerja }}" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">No SK</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="" readonly value="{{ $pegawai[0]->no_sk }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="" readonly value="{{ Auth::user()->username }}" >
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password">
            </div>
            {{-- <div class="text-muted">*</div> --}}
        </div>
        <div class="text-end">
            <button class="btn btn-primary">
                <i class="fas fa-edit"></i>
                Update data
            </button>
        </div>
    </form>
</div>


@endsection