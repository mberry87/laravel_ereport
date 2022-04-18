@extends('layouts.admin')

@section('title', 'Detail Data PBM')

@section('breadcump')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Data PBM</li>
    <li class="breadcrumb-item active">Detail</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('pbm.index') }}" class="btn btn-secondary btn-sm d-inline">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <a href="{{ route('pbm.edit', $pbm->id) }}" class="btn btn-warning btn-sm mr-2 d-inline mx-3 ">
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
                        <td>{{ $pbm->user->name }}</td>
                        <td>{{ $pbm->user->nama_perusahaan }}</td>
                        <td>{{ $pbm->created_at->format('d M Y, H:i:s') }}</td>
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
                            <td>{{ $pbm->nama_kapal }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Bendera</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $pbm->bendera->nama }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Jenis Kapal</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $pbm->jenis_kapal->nama }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Ukuran DWT</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $pbm->ukuran_dwt != null ? $pbm->ukuran_dwt : '-' }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Ukuran GT</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $pbm->ukuran_isi_kotor != null ? $pbm->ukuran_isi_kotor : '-' }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Ukuran LOA</td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $pbm->ukuran_loa != null ? $pbm->ukuran_loa : '-' }}</td>
                        </tr>
                        <tr>
                            <td style="width: 40%">Agen </td>
                            <td class="text-center" style="width: 5%">:</td>
                            <td>{{ $pbm->agen != null ? $pbm->agen : '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-bold mb-4">Laporan Muat</h5>
                        <table class="table table-bordered table-striped table-sm">
                            <tbody>
                                <tr>
                                    <td style="width: 40%">Tanggal Muat</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pbm->muat }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Muat Sistem</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pbm->muat_sistem != null ? $pbm->muat_sistem : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Muat Komoditi</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pbm->muat_komoditi != null ? $pbm->muat_komoditi : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Muat Jenis</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pbm->muat_jenis != null ? $pbm->muat_jenis : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Muat Ton</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pbm->muat_ton != null ? $pbm->muat_ton : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Muat Unit</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pbm->muat_unit != null ? $pbm->muat_unit : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Muat M3</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pbm->muat_m3 != null ? $pbm->muat_m3 : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Terminal Muat</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pbm->terminal_muat != null ? $pbm->terminal_muat->nama : '-' }}
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
                        <h5 class="font-weight-bold mb-4">Laporan Bongkar</h5>
                        <table class="table table-bordered table-striped table-sm">
                            <tbody>
                                <tr>
                                    <td style="width: 40%">Tanggal bongkar</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pbm->bongkar }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">bongkar Sistem</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pbm->bongkar_sistem != null ? $pbm->bongkar_sistem : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">bongkar Komoditi</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pbm->bongkar_komoditi != null ? $pbm->bongkar_komoditi : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">bongkar Jenis</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pbm->bongkar_jenis != null ? $pbm->bongkar_jenis : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">bongkar Ton</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pbm->bongkar_ton != null ? $pbm->bongkar_ton : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">bongkar Unit</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pbm->bongkar_unit != null ? $pbm->bongkar_unit : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">bongkar M3</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pbm->bongkar_m3 != null ? $pbm->bongkar_m3 : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Terminal bongkar</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td>{{ $pbm->terminal_bongkar != null ? $pbm->terminal_bongkar->nama : '-' }}
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
