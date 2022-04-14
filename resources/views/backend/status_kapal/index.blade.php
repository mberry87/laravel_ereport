@extends('layouts.admin')

@section('title', 'Data Status Kapal')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Status Kapal</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <a href="{{ route('status_kapal.create') }}" class="btn btn-primary btn-sm mb-3">
                            <i class="fas fa-plus mr-3"></i>Tambah
                        </a>
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Status Kapal</th>
                                    <th>Keterangan</th>
                                    <th>Waktu Input</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($status_kapal as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->kode }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->keterangan }}</td>
                                        <td>{{ $data->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('status_kapal.edit', $data) }}"
                                                class="btn btn-warning btn-sm mr-2 d-inline">
                                                <i class="fas fa-edit mr-2"></i>
                                                edit
                                            </a>
                                            <a href="{{ route('status_kapal.destroy', $data) }}?delete=true"
                                                class="btn btn-danger btn-sm d-inline" id="btn-hapus">
                                                <i class="fas fa-trash mr-2"></i>
                                                Hapus
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
    </div>
@endsection
