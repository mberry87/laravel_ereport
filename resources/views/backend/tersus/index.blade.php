@extends('layouts.admin')

@section('title', 'Data TERSUS')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data TERSUS</li>
    </ol>
@endsection

@section('content')
    {{-- @if ($pesan = Session::get('success'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
            {{ $pesan }}
</div>
@endif

@if ($pesan = Session::get('hapus'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
    {{ $pesan }}
</div>
@endif --}}
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">Tambah TERSUS</div>
                        <div class="card-body">
                            <a href="{{ route('tersus.datang.create') }}" class="btn btn-primary btn-sm mr-3">
                                <i class="fas fa-backward mr-3"></i>Datang
                            </a>
                            <a href="{{ route('tersus.berangkat.create') }}" class="btn btn-danger btn-sm">
                                <i class="fas fa-forward mr-3"></i>Berangkat
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">Filter</div>
                        <div class="card-body">
                            <form action="{{ route('tersus.index') }}" method="GET">
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
                                <a class="btn btn-secondary btn-sm d-inline" href="{{ route('tersus.index') }}">
                                    <i class="fas fa-undo mr-2"></i>
                                    Reset
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Data TERSUS
                </div>
                <div class="card-body">
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
                            @foreach ($tersus as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_kapal }}</td>
                                    <td>{{ $data->bendera->nama }}</td>
                                    <td>{{ $data->datang }}</td>
                                    <td>{{ $data->berangkat }}</td>
                                    <td>
                                        <a href="{{ route('tersus.show', $data) }}"
                                            class="btn btn-success btn-sm mr-2 d-inline" data-toggle="tooltip" title="show">
                                            <i class="fas fa-eye"></i>

                                        </a>
                                        <a href="{{ route('tersus.datang.edit', $data->id) }}"
                                            class="btn btn-warning btn-sm mr-2 d-inline" data-toggle="tooltip"
                                            title="edit datang">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('tersus.berangkat.edit', $data->id) }}"
                                            class="btn btn-warning btn-sm mr-2  d-inline" data-toggle="tooltip"
                                            title="edit berangkat">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- <form action="{{ route('tersus.destroy', $data->id) }}" method="POST"
                                class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm d-inline" type="submit" data-toggle="tooltip"
                                    id="btn-hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                                </form> --}}
                                        <a href="{{ route('tersus.destroy', $data->id) }}?delete=true"
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
