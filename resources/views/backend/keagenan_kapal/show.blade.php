@extends('layouts.admin')

@section('title', 'Show Keagenan kapal')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Show Keagenan Kapal</li>
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
                    <a href="{{ route('keagenan_kapal.datang.edit', $keagenan_kapal->id) }}"
                        class="btn btn-warning btn-sm mr-2 d-inline mx-3 ">
                        <i class="fas fa-edit mr-2"></i>
                        Edit kedatangan
                    </a>
                    <a href="{{ route('keagenan_kapal.berangkat.edit', $keagenan_kapal->id) }}"
                        class="btn btn-warning btn-sm d-inline">
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
                                <td>{{ $keagenan_kapal->datang }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Dari Pelabuhan</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $keagenan_kapal->pelabuhan_datang != null ? $keagenan_kapal->pelabuhan_datang->nama : '-' }}
                                </td>
                            </tr>
                            <tr>
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
                            <tr>
                                <td style="width: 40%">Status Trayek</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $keagenan_kapal->status_trayek_datang != null ? $keagenan_kapal->status_trayek_datang->nama : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Status Kapal</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $keagenan_kapal->status_kapal_datang != null ? $keagenan_kapal->status_kapal_datang->nama : '-' }}
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
                                <td>{{ $keagenan_kapal->berangkat }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Ke Pelabuhan</td>
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
                            <tr>
                                <td style="width: 40%">Status Trayek</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $keagenan_kapal->status_trayek_berangkat != null ? $keagenan_kapal->status_trayek_berangkat->nama : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Status Kapal</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $keagenan_kapal->status_kapal_berangkat != null ? $keagenan_kapal->status_kapal_berangkat->nama : '-' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
