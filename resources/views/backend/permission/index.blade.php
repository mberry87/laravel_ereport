@extends('layouts.admin')

@section('title', 'Pemberitahuan')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Permission</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Data Permission</div>
                <div class="card-header">
                    <div class="card-body">
                        @if(env('APP_DEBUG'))
                        <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm mb-3">
                            <i class="fas fa-plus mr-3"></i>Tambah permission
                        </a>
                        @endif
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama permission</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            @if(env('APP_DEBUG'))
                                            <a href="{{ route('permissions.edit', $data) }}" class="btn btn-warning btn-sm mr-2 d-inline">
                                                <i class="fas fa-edit mr-2"></i>
                                                edit
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
