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
                <th>Gaji Pokok Lama</th>
                <th>Gaji Pokok Baru</th>
                <th>Tunjangan Jabatan</th>
                <th>Tunjangan Kesejahteraan Keluarga</th>
                <th>Total Gaji</th>
                <th>Berkala Gaji</th>
                <th>Tahun</th>
                {{-- <th>Aksi</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($data['daftar-gaji'] as $item)
            <tr>
                <td>{{ number_format($item->gaji_pokok) }}</td>
                <td>{{ number_format(($item->gaji_pokok) + 50000) }}</td>
                <td>{{ number_format($item->tunjangan_jabatan) }}</td>
                <td>{{ number_format($item->tunjangan_kesejahteraan_keluarga) }}</td>
                <td>{{ number_format($item->total_gaji) }}</td>
                <td>{{ date('M Y',strtotime($item->berkala_gaji)) }}</td>
                <td>{{ date('Y',strtotime($item->berkala_gaji)) }}</td>
                {{-- <td>

                    @if ($item->disetujui == 'sudah')
                    -
                    @else
                    <form action="{{ route('kenaikan-gaji.setuju',$item->id) }}" method="post">
                        @csrf
                        @method('patch')

                        <button class="btn btn-primary btn-sm">
                            Setujui
                        </button>
                    </form>
                    @endif

                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection