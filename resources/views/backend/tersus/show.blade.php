@extends('layouts.admin')

@section('title', 'Show TERSUS')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Show TERSUS</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <a href="{{ route('tersus.index') }}" class="btn btn-secondary btn-sm mb-3">
                            <i class="fas fa-arrow-left mr-3"></i>Kembali
                        </a>

                        <h5 class="mt-4">Laporan Kedatangan</h5>
                        <table class="table table-striped table-sm">
                            <tbody>
                                @foreach ($tersus as $data)
                                    <tr>
                                        <td style="width: 40%">Nama Kapal</td>
                                        <td class="text-center" style="width: 5%">:</td>
                                        <td>{{ $data->nama_kapal }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 40%">Bendera</td>
                                        <td class="text-center" style="width: 5%">:</td>
                                        <td>{{ $data->bendera->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 40%">Isi Kotor (GT)</td>
                                        <td class="text-center" style="width: 5%">:</td>
                                        <td>{{ $data->isi_kotor }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 40%">Tanggal Kedatangan</td>
                                        <td class="text-center" style="width: 5%">:</td>
                                        <td>{{ $data->tgl_datang }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 40%">Pelabuhan Kedatangan</td>
                                        <td class="text-center" style="width: 5%">:</td>
                                        <td>{{ $data->pelabuhan_datang->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 40%">Terminal Kedatangan</td>
                                        <td class="text-center" style="width: 5%">:</td>
                                        <td>{{ $data->terminal_datang->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 40%">Jenis Muatan</td>
                                        <td class="text-center" style="width: 5%">:</td>
                                        <td>{{ $data->jenis_muatan_datang }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 40%">Jumlah Bongkar</td>
                                        <td class="text-center" style="width: 5%">:</td>
                                        <td>{{ $data->jumlah_bongkar_datang }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <h5 class="mt-4">Laporan Keberangkatan</h5>
                        <table class="table table-striped table-sm">
                            <tbody>
                                <tr>
                                    <td style="width: 40%">Nama Kapal</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Bendera</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Isi Kotor (GT)</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Tanggal Berangakt</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Pelabuhan Berangkat</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Terminal Berangkat</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Jenis Muatan</td>
                                    <td class="text-center" style="width: 5%">:</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
