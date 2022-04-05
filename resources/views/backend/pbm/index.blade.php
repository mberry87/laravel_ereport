@extends('layouts.admin')

@section('title', 'Data PBM')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data PBM>
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
                    <a href="{{ route('pbm.muat.create') }}" class="btn btn-primary btn-sm mb-3 mr-3">
                        <i class="fas fa-download mr-3"></i>Muat
                    </a>
                    <a href="{{ route('pbm.bongkar.create') }}" class="btn btn-danger btn-sm mb-3">
                        <i class="fas fa-upload mr-3"></i>Bongkar
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
                                <th>Muat</th>
                                <th>Bongkar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pbm as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_kapal }}</td>
                                    <td>{{ $data->bendera->nama }}</td>
                                    <td>{{ $data->muat }}</td>
                                    <td>{{ $data->bongkar }}</td>
                                    <td>
                                        <a href="{{ route('pbm.show', $data) }}"
                                            class="btn btn-success btn-sm mr-2 d-inline" data-toggle="tooltip" title="show">
                                            <i class="fas fa-eye"></i>

                                        </a>
                                        <a href="{{ route('pbm.muat.edit', $data->id) }}"
                                            class="btn btn-warning btn-sm mr-2 d-inline" data-toggle="tooltip"
                                            title="edit muat">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('pbm.bongkar.edit', $data->id) }}"
                                            class="btn btn-warning btn-sm mr-2  d-inline" data-toggle="tooltip"
                                            title="edit bongkar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('pbm.destroy', $data->id) }}" method="POST"
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
