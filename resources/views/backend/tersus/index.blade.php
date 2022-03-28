@extends('layouts.admin')

@section('title', 'Data TERSUS')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data TERSUS</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <a href="{{ route('tersus.create') }}" class="btn btn-primary btn-sm mb-3 mr-3">
                            <i class="fas fa-backward mr-3"></i>Datang
                        </a>
                        <a href="{{ route('tersus.berangkat.create') }}" class="btn btn-danger btn-sm mb-3">
                            <i class="fas fa-forward mr-3"></i>Berangkat
                        </a>
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
                                        <td>{{ $data->tgl_datang }}</td>
                                        <td>{{ $data->tgl_berangkat }}</td>
                                        <td><a href="{{ route('tersus.show', $data) }}"
                                                class="btn btn-warning btn-sm mr-2 d-inline">
                                                <i class="fas fa-eye mr-2"></i>
                                                show
                                            </a></td>
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
