@extends('layouts.admin')

@section('title', 'Detail Data Pelnas')

@section('breadcump')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Data Pelnnas</li>
    <li class="breadcrumb-item active">Detail</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('pelnas.index') }}" class="btn btn-secondary btn-sm d-inline">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <a href="{{ route('pelnas.edit', $pelnas->id) }}" class="btn btn-warning btn-sm mr-2 d-inline mx-3 ">
                    <i class="fas fa-edit mr-2"></i>
                    Edit
                </a>
                <table class="table table-sm table-bordered table-hover mt-3">
                    <tr>
                        <th>Diinput Oleh</th>
                        <th>Nama Perusahaan</th>
                        <th>Tanggal diinput</th>
                    </tr>
                    <tr>
                        <td>{{ $pelnas->user->name }}</td>
                        <td>{{ $pelnas->user->nama_perusahaan }}</td>
                        <td>{{ $pelnas->created_at->format('d M Y, H:i:s') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="font-weight-bold mb-4">Info Kapal</h5>
                <table class="table table-bordered table-striped table-sm">
                    <tbody>
                        <tr>
                            <td style="width: 40%">Jenis Kapal</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $pelnas->nama_kapal }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Bendera</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $pelnas->bendera->nama }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Isi Kotor (GT)</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $pelnas->isi_kotor != null ? $pelnas->isi_kotor : '-' }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Status Trayek</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $pelnas->status_trayek_datang != null ? $pelnas->status_trayek_datang->nama : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Status Kapal</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $pelnas->status_kapal_datang != null ? $pelnas->status_kapal_datang->nama : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Jenis Kapal</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $pelnas->jenis_kapal_datang != null ? $pelnas->jenis_kapal_datang->nama : '-' }}
                            </td>
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
                                    <td>{{ $pelnas->datang }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Dari Pelabuhan</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pelnas->pelabuhan_datang != null ? $pelnas->pelabuhan_datang->nama : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Terminal Kedatangan</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pelnas->terminal_datang != null ? $pelnas->terminal_datang->nama : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Jenis Muatan</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pelnas->jenis_muatan_datang != null ? $pelnas->jenis_muatan_datang : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Jumlah Bongkar</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pelnas->jumlah_bongkar_datang != null ? $pelnas->jumlah_bongkar_datang : '-' }}
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
                                    <td style="width: 40%">Tanggal Berangakt</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pelnas->berangkat }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Ke Pelabuhan</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pelnas->pelabuhan_berangkat != null ? $pelnas->pelabuhan_berangkat->nama : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Terminal Berangkat</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pelnas->terminal_berangkat != null ? $pelnas->terminal_berangkat->nama : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Jenis Muatan</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pelnas->jenis_muatan_berangkat != null ? $pelnas->jenis_muatan_berangkat : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Jumlah Muatan</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pelnas->jumlah_muatan_berangkat != null ? $pelnas->jumlah_muatan_berangkat : '-' }}
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
