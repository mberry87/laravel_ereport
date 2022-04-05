@extends('layouts.admin')

@section('title', 'Show PBM')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Show PBM</li>
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
                    <a href="{{ route('pbm.muat.edit', $pbm->id) }}"
                        class="btn btn-warning btn-sm mr-2 d-inline mx-3 ">
                        <i class="fas fa-edit mr-2"></i>
                        Edit muat
                    </a>
                    <a href="{{ route('pbm.bongkar.edit', $pbm->id) }}"
                        class="btn btn-warning btn-sm d-inline">
                        <i class="fas fa-edit mr-2"></i>
                        Edit bongkar
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
                                <td>{{ $pbm->nama_kapal }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Bendera</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pbm->bendera->nama }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-4">Laporan Muat</h5>
                    <table class="table table-striped table-sm">
                        <tbody>
                            <tr>
                                <td style="width: 40%">Agen Muat</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pbm->agen_muat != null ? $pbm->agen_muat : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Tanggal Muat</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pbm->muat }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Jenis Kapal</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pbm->jenis_kapal_muat != null ? $pbm->jenis_kapal_muat->nama : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Ukuran DWT</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pbm->ukuran_dwt_muat != null ? $pbm->ukuran_dwt_muat : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Ukuran GT</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pbm->ukuran_isi_kotor_muat != null ? $pbm->ukuran_isi_kotor_muat : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Ukuran LOA</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pbm->ukuran_loa_muat != null ? $pbm->ukuran_loa_muat : '-' }}</td>
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
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-4">Laporan Bongkar</h5>
                    <table class="table table-striped table-sm">
                        <tbody>
                            <tr>
                                <td style="width: 40%">Agen bongkar</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pbm->agen_bongkar != null ? $pbm->agen_bongkar : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Tanggal bongkar</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pbm->bongkar }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Jenis Kapal</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pbm->jenis_kapal_bongkar != null ? $pbm->jenis_kapal_bongkar->nama : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Ukuran DWT</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pbm->ukuran_dwt_bongkar != null ? $pbm->ukuran_dwt_bongkar : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Ukuran GT</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pbm->ukuran_isi_kotor_bongkar != null ? $pbm->ukuran_isi_kotor_bongkar : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Ukuran LOA</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $pbm->ukuran_loa_bongkar != null ? $pbm->ukuran_loa_bongkar : '-' }}</td>
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
@endsection
