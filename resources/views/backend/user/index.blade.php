@extends('layouts.admin')

@section('title', 'Data User')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data User</li>
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
                <div class="card-header">Data Pengguna</div>
                <div class="card-header">
                    <div class="card-body">
                        <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm mb-3">
                            <i class="fas fa-plus mr-3"></i>Tambah
                        </a>
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Email</th>
                                    <th>No.HP</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->no_hp }}</td>
                                        <td><span class="badge badge-primary">{{ $data->status }}</span></td>
                                        <td><span class="badge badge-secondary">{{ $data->role }}</span></td>
                                        <td>
                                            @if (auth()->user()->id == $data->id)
                                            @else
                                                <a href="{{ route('user.show', $data) }}"
                                                    class="btn btn-warning btn-sm mr-2 d-inline">
                                                    <i class="fas fa-eye mr-2"></i>
                                                    show
                                                </a>
                                                <a href="{{ route('user.edit', $data) }}"
                                                    class="btn btn-warning btn-sm mr-2 d-inline">
                                                    <i class="fas fa-edit mr-2"></i>
                                                    edit
                                                </a>
                                                <a href="{{ route('user.destroy', $data) }}?delete=true"
                                                    class="btn btn-danger btn-sm d-inline" id="btn-hapus">
                                                    <i class="fas fa-trash mr-2"></i>
                                                    Hapus
                                                </a>
                                            @endif
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
