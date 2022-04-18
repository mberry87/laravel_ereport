@extends('layouts.admin')

@section('title', 'Detail Data TERSUS')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Data TERSUS</li>
        <li class="breadcrumb-item active">Detail</li>
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
                    <a href="{{ route('tersus.edit', $tersus->id) }}"
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
                            <td>{{ $tersus->user->name }}</td>
                            <td>{{ $tersus->user->nama_perusahaan }}</td>
                            <td>{{ $tersus->created_at->format('d M Y, H:i:s') }}</td>
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
                    <h5 class="font-weight-bold mb-4">Laporan Kedatangan</h5>
                    <table class="table table-bordered table-striped table-sm">
                        <tbody>
                            <tr>
                                <td style="width: 40%">Tanggal Kedatangan</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $tersus->datang }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Dari Pelabuhan</td>
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
                                <td>{{ $tersus->jenis_muatan_datang != null ? $tersus->jenis_muatan_datang : '-' }}</td>
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
                    <h5 class="font-weight-bold mb-4">Laporan Keberangkatan</h5>
                    <table class="table table-bordered table-striped table-sm">
                        <tbody>
                            <tr>
                                <td style="width: 40%">Tanggal Berangakat</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $tersus->berangkat }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Ke Pelabuhan</td>
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
