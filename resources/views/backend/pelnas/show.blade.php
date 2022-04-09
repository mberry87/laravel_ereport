@extends('layouts.admin')

@section('title', 'Show PELNAS')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data PELNAS</li>
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
                    <a href="{{ route('pelnas.datang.edit', $pelnas->id) }}"
                        class="btn btn-warning btn-sm mr-2 d-inline mx-3 ">
                        <i class="fas fa-edit mr-2"></i>
                        Edit kedatangan
                    </a>
                    <a href="{{ route('pelnas.berangkat.edit', $pelnas->id) }}" class="btn btn-warning btn-sm d-inline">
                        <i class="fas fa-edit mr-2"></i>
                        Edit keberangkatan
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-4">Info Kapal</h5>
                    <table class="table table-striped table-sm">
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
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-4">Laporan Kedatangan</h5>
                    <table class="table table-striped table-sm">
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
                                <td>{{ $pelnas->terminal_datang != null ? $pelnas->terminal_datang->nama : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Jenis Muatan</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pelnas->jenis_muatan_datang != null ? $pelnas->jenis_muatan_datang : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Jumlah Bongkar</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pelnas->jumlah_bongkar_datang != null ? $pelnas->jumlah_bongkar_datang : '-' }}
                                </td>
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
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-4">Laporan Keberangkatan</h5>
                    <table class="table table-striped table-sm">
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
                            <tr>
                                <td style="width: 40%">Status Trayek</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pelnas->status_trayek_berangkat != null ? $pelnas->status_trayek_berangkat->nama : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Status Kapal</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pelnas->status_kapal_berangkat != null ? $pelnas->status_kapal_berangkat->nama : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%">jenis Kapal</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pelnas->jenis_kapal_berangkat != null ? $pelnas->jenis_kapal_berangkat->nama : '-' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
