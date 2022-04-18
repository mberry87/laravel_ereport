@extends('layouts.admin')

@section('title', 'Detail Keagenan kapal')

@section('breadcump')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Data Keagenan Kapal</li>
    <li class="breadcrumb-item active">Detail</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('keagenan_kapal.index') }}" class="btn btn-secondary btn-sm d-inline">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <a href="{{ route('keagenan_kapal.edit', $keagenan_kapal->id) }}"
                    class="btn btn-warning btn-sm mr-2 d-inline mx-3 ">
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
                        <td>{{ $keagenan_kapal->user->name }}</td>
                        <td>{{ $keagenan_kapal->user->nama_perusahaan }}</td>
                        <td>{{ $keagenan_kapal->created_at->format('d M Y, H:i:s') }}</td>
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
                            <td style="width: 40%">Nama Kapal</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $keagenan_kapal->nama_kapal }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Bendera</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $keagenan_kapal->bendera->nama }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Isi Kotor (GT)</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $keagenan_kapal->isi_kotor != null ? $keagenan_kapal->isi_kotor : '-' }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Status Trayek</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $keagenan_kapal->status_trayek != null ? $keagenan_kapal->status_trayek->nama : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Status Kapal</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $keagenan_kapal->status_kapal != null ? $keagenan_kapal->status_kapal->nama : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Jenis Kapal</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $keagenan_kapal->jenis_kapal != null ? $keagenan_kapal->jenis_kapal->nama : '-' }}
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
                                    <td>{{ $keagenan_kapal->datang }}</td>
                                </tr>
                                <tr>
                                <tr>
                                    <td style="width: 40%">Pelabuhan Datang</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $keagenan_kapal->pelabuhan_datang != null ? $keagenan_kapal->pelabuhan_datang->nama : '-' }}
                                    </td>
                                </tr>
                                <td style="width: 40%">Terminal Kedatangan</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $keagenan_kapal->terminal_datang != null ? $keagenan_kapal->terminal_datang->nama : '-' }}
                                </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Jenis Muatan</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $keagenan_kapal->jenis_muatan_datang != null ? $keagenan_kapal->jenis_muatan_datang : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Jumlah Bongkar</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $keagenan_kapal->jumlah_bongkar_datang != null ? $keagenan_kapal->jumlah_bongkar_datang : '-' }}
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
                                    <td style="width: 40%">Tanggal Berangkat</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $keagenan_kapal->berangkat }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Pelabuhan Berangkat</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $keagenan_kapal->pelabuhan_berangkat != null ? $keagenan_kapal->pelabuhan_berangkat->nama : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Terminal Berangkat</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $keagenan_kapal->terminal_berangkat != null ? $keagenan_kapal->terminal_berangkat->nama : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Jenis Muatan</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $keagenan_kapal->jenis_muatan_berangkat != null ? $keagenan_kapal->jenis_muatan_berangkat : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Jumlah Muatan</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $keagenan_kapal->jumlah_muatan_berangkat != null ? $keagenan_kapal->jumlah_muatan_berangkat : '-' }}
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
