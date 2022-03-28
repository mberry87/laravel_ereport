@extends('layouts.admin')

@section('title', 'Show TERSUS')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Show TERSUS</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('tersus.index') }}" class="btn btn-secondary btn-sm d-inline">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                    <a href="{{ route('tersus.datang.edit', $tersus->id) }}"
                        class="btn btn-warning btn-sm mr-2 d-inline mx-3 ">
                        <i class="fas fa-edit mr-2"></i>
                        Edit kedatangan
                    </a>
                    <a href="{{ route('tersus.berangkat.edit', $tersus->id) }}" class="btn btn-warning btn-sm d-inline">
                        <i class="fas fa-edit mr-2"></i>
                        Edit keberangkatan
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <tbody>
                            <tr>
                                <td style="width: 40%">Nama Kapal</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $tersus->nama_kapal }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Bendera</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $tersus->bendera->nama }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Isi Kotor (GT)</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $tersus->isi_kotor != null ? $tersus->isi_kotor : '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="">Laporan Kedatangan</h5>
                    <table class="table table-striped table-sm">
                        <tbody>
                            <tr>
                                <td style="width: 40%">Tanggal Kedatangan</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $tersus->datang }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Pelabuhan Kedatangan</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $tersus->pelabuhan_datang != null ? $tersus->pelabuhan_datang->nama : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Terminal Kedatangan</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $tersus->terminal_datang != null ? $tersus->terminal_datang->nama : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Jenis Muatan</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $tersus->jenis_muatan != null ? $tersus->jenis_muatan : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Jumlah Bongkar</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $tersus->jumlah_bongkar_datang != null ? $tersus->jumlah_bongkar_datang : '-' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5>Laporan Keberangkatan</h5>
                    <table class="table table-striped table-sm">
                        <tbody>
                            <tr>
                                <td style="width: 40%">Tanggal Berangakt</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $tersus->berangkat }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Pelabuhan Berangkat</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $tersus->pelabuhan_berangkat != null ? $tersus->pelabuhan_berangkat->nama : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Terminal Berangkat</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $tersus->terminal_berangkat != null ? $tersus->terminal_berangkat->nama : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Jenis Muatan</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $tersus->jenis_muatan_berangkat != null ? $tersus->jenis_muatan_berangkat : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Jumlah Muatan</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $tersus->jumlah_muatan_berangkat != null ? $tersus->jumlah_muatan_berangkat : '-' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
