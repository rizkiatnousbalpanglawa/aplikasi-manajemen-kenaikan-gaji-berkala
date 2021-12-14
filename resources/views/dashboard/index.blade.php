@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <h1 class="mt-2">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <div class="row justify-content-evenly">
        <div class="col-auto">
            <div class="card shadow" style="width: 250px">
                <div class="card-body">
                    <div class="d-flex justify-content-between ">
                        <div class="">
                            <div class="div">Total Pegawai</div>
                            <br>
                            <div class="fw-bold h4">{{ $data['jumlah-pegawai'] }} Orang</div>
                        </div>
                        <div class="align-self-center rounded-circle p-3" style="color: blue; background-color: #e0e8f7">
                            <i class="fal fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="card shadow" style="width: 250px">
                <div class="card-body">
                    <div class="d-flex justify-content-between ">
                        <div class="">
                            <div class="div">KGB Ditolak</div>
                            <br>
                            <div class="fw-bold h4">{{ $data['kgb-ditolak'] }} Orang</div>
                        </div>
                        <div class="align-self-center rounded-circle p-3" style="color: blue; background-color: #e0e8f7">
                            <i class="fal fa-user-plus fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="card shadow" style="width: 250px">
                <div class="card-body">
                    <div class="d-flex justify-content-between ">
                        <div class="">
                            <div class="div">KGB Diterima</div>
                            <br>
                            <div class="fw-bold h4">{{ $data['kgb-diterima'] }} Orang</div>
                        </div>
                        <div class="align-self-center rounded-circle p-3" style="color: blue; background-color: #e0e8f7">
                            <i class="fal fa-bell fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection