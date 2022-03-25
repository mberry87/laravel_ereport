@extends('layouts.admin')

@section('title', 'Data Pelabuhan')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Pelabuhan</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
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
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <a href="{{ route('pelabuhan.create') }}" class="btn btn-primary btn-sm mb-3">
                            <i class="fas fa-plus mr-3"></i>Tambah
                        </a>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Pelabuhan</th>
                                    <th>Keterangan</th>
                                    <th>Waktu Input</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelabuhan as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->kode }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->keterangan }}</td>
                                        <td>{{ $data->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('pelabuhan.edit', $data) }}"
                                                class="btn btn-warning btn-sm mr-2 d-inline">
                                                <i class="fas fa-edit mr-2"></i>
                                                edit
                                            </a>
                                            <form action="{{ route('pelabuhan.destroy', $data) }}" method="POST"
                                                class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Hapus Pelabuhan ini?')" type="submit">
                                                    <i class="fas fa-trash mr-2"></i>hapus
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
    </div>
@endsection
