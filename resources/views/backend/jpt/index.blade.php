@extends('layouts.admin')

@section('title', 'Data JPT')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data JPT</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">Tambah JPT</div>
                        <div class="card-body">
                            <a href="{{ route('jpt.muat.create') }}" class="btn btn-primary btn-sm mb-3 mr-3">
                                <i class="fas fa-download mr-3"></i>Muat
                            </a>
                            <a href="{{ route('jpt.bongkar.create') }}" class="btn btn-danger btn-sm mb-3">
                                <i class="fas fa-upload mr-3"></i>Bongkar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">Filter</div>
                        <div class="card-body">
                            <form action="{{ route('jpt.index') }}" method="GET">
                                <input type="hidden" name="filter" value="yes" required>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tanggal awal:</label>
                                            <input type="date" name="tanggal_awal" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tanggal akhir:</label>
                                            <input type="date" name="tanggal_akhir" required>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-info btn-sm d-inline" type="submit">
                                    <i class="fas fa-table mr-2"></i>
                                    Tampilkan
                                </button>
                                <a class="btn btn-secondary btn-sm d-inline" href="{{ route('jpt.index') }}">
                                    <i class="fas fa-undo mr-2"></i>
                                    Reset
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Data JPT</div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cetakLaporan">
                        <i class="fas fa-file-pdf mr-2"></i>
                        Cetak Laporan
                    </button>

                    <div class="modal fade" id="cetakLaporan" tabindex="-1" aria-labelledby="cetakLaporanLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="cetakLaporanLabel">Cetak Laporan Jpt</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('jpt.laporan') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="tgl_awal">Tanggal Awal</label>
                                            <input type="date" name="tgl_awal" id="tgl_awal" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_akhir">Tanggal Akhir</label>
                                            <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                                            <i class="fas fa-times mr-2"></i>
                                            Batal</button>
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fas fa-file-pdf mr-2"></i>
                                            Cetak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kapal</th>
                                <th>Bendera</th>
                                <th>Jenis Kapal</th>
                                <th>Muat</th>
                                <th>Bongkar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jpt as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_kapal }}</td>
                                    <td>{{ $data->bendera->nama }}</td>
                                    <td>{{ $data->jenis_kapal->nama }}</td>
                                    <td>{{ $data->muat }}</td>
                                    <td>{{ $data->bongkar }}</td>
                                    <td>
                                        <a href="{{ route('jpt.show', $data) }}"
                                            class="btn btn-success btn-sm mr-2 d-inline" data-toggle="tooltip" title="show">
                                            <i class="fas fa-eye"></i>

                                        </a>
                                        <a href="{{ route('jpt.muat.edit', $data->id) }}"
                                            class="btn btn-warning btn-sm mr-2 d-inline" data-toggle="tooltip"
                                            title="edit muat">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('jpt.bongkar.edit', $data->id) }}"
                                            class="btn btn-warning btn-sm mr-2  d-inline" data-toggle="tooltip"
                                            title="edit bongkar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('jpt.destroy', $data->id) }}?delete=true"
                                            class="btn btn-danger btn-sm mr-2  d-inline" data-toggle="tooltip" title="hapus"
                                            id="btn-hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
