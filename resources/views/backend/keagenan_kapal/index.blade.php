@extends('layouts.admin')

@section('title', 'Data Keagenan Kapal')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Kegenan Kapal</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('keagenan_kapal.datang.create') }}" class="btn btn-primary btn-sm mb-3 mr-3">
                        <i class="fas fa-backward mr-3"></i>Datang
                    </a>
                    <a href="{{ route('keagenan_kapal.berangkat.create') }}" class="btn btn-danger btn-sm mb-3">
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
                            @foreach ($keagenan_kapal as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_kapal }}</td>
                                    <td>{{ $data->bendera->nama }}</td>
                                    <td>{{ $data->datang }}</td>
                                    <td>{{ $data->berangkat }}</td>
                                    <td>
                                        <a href="{{ route('keagenan_kapal.show', $data) }}"
                                            class="btn btn-success btn-sm mr-2 d-inline" data-toggle="tooltip" title="show">
                                            <i class="fas fa-eye"></i>

                                        </a>
                                        <a href="{{ route('keagenan_kapal.datang.edit', $data->id) }}"
                                            class="btn btn-warning btn-sm mr-2 d-inline" data-toggle="tooltip"
                                            title="edit datang">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('keagenan_kapal.berangkat.edit', $data->id) }}"
                                            class="btn btn-warning btn-sm mr-2  d-inline" data-toggle="tooltip"
                                            title="edit berangkat">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('keagenan_kapal.destroy', $data->id) }}?delete=true"
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
