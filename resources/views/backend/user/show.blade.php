@extends('layouts.admin')

@section('title', 'Detail data User')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data User</li>
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
                <div class="card-body">
                    <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-arrow-left mr-3"></i>Kembali
                    </a>
                    <a href="{{ route('user.edit', $user) }}" class="btn btn-warning btn-sm mr-2 d-inline">
                        <i class="fas fa-edit mr-2"></i>
                        edit
                    </a>
                    <a href="{{ route('user.reset.password', $user->id) }}"
                        onclick="return confirm('reset password User ini?')" class="btn btn-warning btn-sm mr-2 d-inline">
                        <i class="fas fa-key mr-2"></i>
                        reset password
                    </a>
                    <a href="{{ route('user.reset.status', $user->id) }}"
                        onclick="return confirm('update status user ini?')" class="btn btn-warning btn-sm mr-2 d-inline">
                        <i class="fas fa-redo-alt mr-2"></i>
                        update status
                    </a>
                    <form action="{{ route('user.destroy', $user) }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus User ini?')" type="submit">
                            <i class="fas fa-trash mr-2"></i>hapus user
                        </button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                @if ($user->avatar == null)
                                    <img src="https://ui-avatars.com/api/?size=128&name={{ $user->name }}"
                                        class="img-thumbnail" width="128" alt="img">
                                @else
                                    <img src="https://ui-avatars.com/api/?size=128&name={{ $user->name }}"
                                        class="img-thumbnail" width="128" alt="img">
                                @endif
                                <table class="table table-bordered table-sm mt-3 mb-2">
                                    <tr>
                                        <th>Nama Perusahaan</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $user->nama_perusahaan }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-8">
                                <table class="table table-sm table-bordered">
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>No.HP</th>
                                        <td>{{ $user->no_hp }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <span class="badge badge-info">{{ $user->status }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Role</th>
                                        <td>
                                            <span class="badge badge-secondary">{{ $user->role }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $user->alamat }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
