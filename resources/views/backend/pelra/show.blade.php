@extends('layouts.admin')

@section('title', 'Detail Data PELRA')

@section('breadcump')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Data PELRA</li>
    <li class="breadcrumb-item active">Detail</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('pelra.index') }}" class="btn btn-secondary btn-sm d-inline">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <a href="{{ route('pelra.edit', $pelra->id) }}"
                    class="btn btn-warning btn-sm mr-2 d-inline mx-3 ">
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
                            <td>{{ $pelra->nama_kapal }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Bendera</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $pelra->bendera->nama }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Isi Kotor (GT)</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $pelra->isi_kotor != null ? $pelra->isi_kotor : '-' }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Status Trayek</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $pelra->status_trayek->nama }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Status Kapal</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $pelra->status_kapal->nama }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-bold mb-4">Laporan Kedatangan</h5>
                        <table class="table table-bordered table-striped table-sm">
                            <tbody>
                                <tr>
                                    <td style="width: 40%">Tanggal Kedatangan</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pelra->datang }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Dari Pelabuhan</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pelra->pelabuhan_datang != null ? $pelra->pelabuhan_datang->nama : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Bongkar</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pelra->bongkar_tonm3 != null ? $pelra->bongkar_tonm3 : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Jenis Muatan</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pelra->jenis_muatan_datang != null ? $pelra->jenis_muatan_datang : '-' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-bold mb-4">Laporan Keberangkatan</h5>
                        <table class="table table-bordered table-striped table-sm">
                            <tbody>
                                <tr>
                                    <td style="width: 40%">Tanggal Berangakat</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pelra->berangkat }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Ke Pelabuhan</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pelra->pelabuhan_berangkat != null ? $pelra->pelabuhan_berangkat->nama : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Muat</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pelra->muat_tonm3 != null ? $pelra->muat_tonm3 : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Jenis Muatan</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pelra->jenis_muatan_berangkat != null ? $pelra->jenis_muatan_berangkat : '-' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
