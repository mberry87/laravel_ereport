@extends('layouts.admin')

@section('title', 'Pemberitahuan')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Pemberitahuan</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            {{-- @if ($pesan = Session::get('sukses'))
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
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <a href="{{ route('pemberitahuan.readall') }}" class="btn btn-primary btn-sm mb-3 mr-2">
                            <i class="fas fa-check mr-3"></i>Tandai sudah dibaca semua
                        </a>
                        <a href="{{ route('pemberitahuan.deleteall') }}" class="btn btn-danger btn-sm mb-3"
                            id="btn-hapus">
                            <i class="fas fa-trash mr-3"></i>Hapus semua pemberitahuan
                        </a>
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pesan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notifications as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->message }}</td>
                                        <td>
                                            @if ($data->is_read != 1)
                                                <a href="{{ route('pemberitahuan.read', $data->id) }}"
                                                    class="btn btn-info btn-sm mr-2 d-inline">
                                                    <i class="fas fa-check mr-2"></i>
                                                    tandai sudah dibaca
                                                </a>
                                            @endif
                                            <a href="{{ $data->link }}" class="btn btn-warning btn-sm mr-2 d-inline">
                                                <i class="fas fa-eye mr-2"></i>
                                                lihat
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
