@extends('layouts.admin')

@section('title', 'Data User')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Bendera</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm mb-3">
                        <i class="fas fa-plus mr-3"></i>Tambah
                    </a>
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Waktu Input</th>

                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td></td>
                                    <td>{{ $data->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if (auth()->user()->id == $data->id)
                                            <small class="text-danger">User Sedang Login</small>
                                        @else
                                            <a href="{{ route('user.edit', $data) }}"
                                                class="btn btn-warning btn-sm mr-2 d-inline">
                                                <i class="fas fa-edit mr-2"></i>
                                                edit
                                            </a>
                                            <form action="{{ route('user.destroy', $data) }}" method="POST"
                                                class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Hapus User ini?')" type="submit">
                                                    <i class="fas fa-trash mr-2"></i>hapus
                                                </button>

                                            </form>
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
@endsection
