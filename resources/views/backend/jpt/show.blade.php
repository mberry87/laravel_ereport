@extends('layouts.admin')

@section('title', 'Show JPT')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Show JPT</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('jpt.index') }}" class="btn btn-secondary btn-sm d-inline">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                    <a href="{{ route('jpt.muat.edit', $jpt->id) }}"
                        class="btn btn-warning btn-sm mr-2 d-inline mx-3 ">
                        <i class="fas fa-edit mr-2"></i>
                        Edit muat
                    </a>
                    <a href="{{ route('jpt.bongkar.edit', $jpt->id) }}"
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
                                <td>{{ $jpt->nama_kapal }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Bendera</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->bendera->nama }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Jenis Kapal</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->jenis_kapal->nama}}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Ukuran DWT</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->ukuran_dwt!= null ? $jpt->ukuran_dwt : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Ukuran GT</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->ukuran_isi_kotor != null ? $jpt->ukuran_isi_kotor : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Ukuran LOA</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->ukuran_loa != null ? $jpt->ukuran_loa : '-' }}</td>
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
                                <td>{{ $jpt->agen_muat != null ? $jpt->agen_muat : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Tanggal Mulai</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->tgl_mulai_muat != null ? $jpt->tgl_mulai_muat : '-'  }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Tanggal Selesai</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->tgl_selesai_muat != null ? $jpt->tgl_selesai_muat : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Perusahaan Pengirim</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->perusahaan_muat_pengirim != null ? $jpt->perusahaan_muat_pengirim : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Perusahaan Penerima</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->perusahaan_muat_penerima != null ? $jpt->perusahaan_muat_penerima : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Muat Sistem</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->muat_sistem != null ? $jpt->muat_sistem : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Muat Komoditi</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->muat_komoditi != null ? $jpt->muat_komoditi : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Muat Jenis</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->muat_jenis != null ? $jpt->muat_jenis : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Muat Ton</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->muat_ton != null ? $jpt->muat_ton : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Muat Unit</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->muat_unit != null ? $jpt->muat_unit : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Muat M3</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->muat_m3 != null ? $jpt->muat_m3 : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Terminal Muat</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->terminal_muat != null ? $jpt->terminal_muat->nama : '-' }}
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
                                <td>{{ $jpt->agen_bongkar != null ? $jpt->agen_bongkar : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Tanggal Mulai</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->tgl_mulai_bongkar !=null ? $jpt->tgl_mulai_bongkar : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Tanggal Selesai</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->tgl_selesai_bongkar !=null ? $jpt->tgl_selesai_bongkar : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Perusahaan Pengirim</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->perusahaan_bongkar_pengirim !=null ? $jpt->perusahaan_bongkar_pengirim : '-'  }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Perusahaan Penerima</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->perusahaan_bongkar_penerima !=null ? $jpt->perusahaan_bongkar_penerima : '-'  }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">bongkar Sistem</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->bongkar_sistem != null ? $jpt->bongkar_sistem : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">bongkar Komoditi</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->bongkar_komoditi != null ? $jpt->bongkar_komoditi : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">bongkar Jenis</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->bongkar_jenis != null ? $jpt->bongkar_jenis : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">bongkar Ton</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->bongkar_ton != null ? $jpt->bongkar_ton : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">bongkar Unit</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->bongkar_unit != null ? $jpt->bongkar_unit : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">bongkar M3</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->bongkar_m3 != null ? $jpt->bongkar_m3 : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Terminal bongkar</td>
                                <td class="text-center" style="width: 5%">:</td>
                                <td>{{ $jpt->terminal_bongkar != null ? $jpt->terminal_bongkar->nama : '-' }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
