@extends('layouts.admin')

@section('title', 'Data PELNAS')

@section('breadcump')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Data PELNAS</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card collapsed-card">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        Filter
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: none;">
                        <form action="{{ route('pelnas.index') }}" method="GET">
                            <input type="hidden" name="filter" value="yes" required>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Tanggal awal</label>
                                        <input type="date" name="tanggal_awal" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-info btn-sm" type="submit">
                                            <i class="fas fa-table mr-2"></i>
                                            Tampilkan
                                        </button>
                                        <a class="btn btn-secondary btn-sm" href="{{ route('pelnas.index') }}">
                                            <i class="fas fa-undo mr-2"></i>
                                            Reset
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Tanggal akhir</label>
                                        <input type="date" name="tanggal_akhir" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Data PELNAS</div>
            <div class="card-body">
                <a href="{{ route('pelnas.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus-circle mr-3"></i>Tambah
                </a>
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#cetakLaporan">
                    <i class="fas fa-file-pdf mr-2"></i>
                    Cetak Laporan
                </button>
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kapal</th>
                            <th>Bendera</th>
                            <th>Kedatangan</th>
                            <th>Berangkat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelnas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_kapal }}</td>
                            <td>{{ $data->bendera->nama }}</td>
                            <td>{{ $data->datang }}</td>
                            <td>{{ $data->berangkat }}</td>
                            <td>
                                <a href="{{ route('pelnas.show', $data->id) }}"
                                    class="btn btn-success btn-sm mr-2  text-center" data-toggle="tooltip"
                                    title="detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('pelnas.edit', $data->id) }}"
                                    class="btn btn-warning btn-sm mr-2  text-center" data-toggle="tooltip"
                                    title="edit datang">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('pelnas.destroy', $data->id) }}?delete=true"
                                    class="btn btn-danger btn-sm mr-2   text-center" data-toggle="tooltip" title="hapus"
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
<div class="modal fade" id="cetakLaporan" tabindex="-1" aria-labelledby="cetakLaporanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cetakLaporanLabel">Cetak Laporan Pelnas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pelnas.laporan') }}" method="POST" formtarget="_blank" target="_blank">
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
@endsection
