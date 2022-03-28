@extends('layouts.admin')

@section('title', 'Data TERSUS')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data TERSUS</li>
    </ol>
@endsection

@section('content')
    @if ($pesan = Session::get('sukses'))
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
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('tersus.datang.create') }}" class="btn btn-primary btn-sm mb-3 mr-3">
                        <i class="fas fa-backward mr-3"></i>Datang
                    </a>
                    <a href="{{ route('tersus.berangkat.create') }}" class="btn btn-danger btn-sm mb-3">
                        <i class="fas fa-forward mr-3"></i>Berangkat
                    </a>
                </div>
            </div>
            <div class="card">
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
                                            class="btn btn-warning btn-sm mr-2 d-inline" data-toggle="tooltip" title="show">
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
                                        <form action="{{ route('tersus.destroy', $data->id) }}" method="POST"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm d-inline"
                                                onclick="return confirm('Hapus data ini?')" type="submit"
                                                data-toggle="tooltip" title="hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
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
