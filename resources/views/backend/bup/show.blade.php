@extends('layouts.admin')

@section('title', 'Detail Data BUP')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Data BUP</li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('bup.index') }}" class="btn btn-secondary btn-sm d-inline">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                    <a href="{{ route('bup.edit', $bup->id) }}" class="btn btn-warning btn-sm mr-2 d-inline mx-3 ">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-4">Info Kapal</h5>
                    <table class="table table-bordered table-striped table-sm">
                        <tbody>
                            <tr>
                                <td style="width: 40%">Nama Kapal</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $bup->nama_kapal }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Bendera</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $bup->bendera->nama }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Isi Kotor (GT)</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $bup->isi_kotor != null ? $bup->isi_kotor : '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-4">Laporan Kedatangan</h5>
                    <table class="table table-bordered table-striped table-sm">
                        <tbody>
                            <tr>
                                <td style="width: 40%">Tanggal Kedatangan</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $bup->datang }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Dari Pelabuhan</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $bup->pelabuhan_datang != null ? $bup->pelabuhan_datang->nama : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Terminal Kedatangan</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $bup->terminal_datang != null ? $bup->terminal_datang->nama : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Kegiatan Datang</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $bup->kegiatan_datang != null ? $bup->kegiatan_datang : '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-4">Laporan Keberangkatan</h5>
                    <table class="table table-bordered table-striped table-sm">
                        <tbody>
                            <tr>
                                <td style="width: 40%">Tanggal Berangakt</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $bup->berangkat }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Ke Pelabuhan</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $bup->pelabuhan_berangkat != null ? $bup->pelabuhan_berangkat->nama : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Terminal Berangkat</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $bup->terminal_berangkat != null ? $bup->terminal_berangkat->nama : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Kegiatan Berangkat</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $bup->kegiatan_berangkat != null ? $bup->kegiatan_berangkat : '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
