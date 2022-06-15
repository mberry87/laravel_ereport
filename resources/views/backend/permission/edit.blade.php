@extends('layouts.admin')

@section('title', 'Permission')

@section('breadcump')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item">Permission</li>
    <li class="breadcrumb-item active">Edit permission</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Edit Data Permission</div>
            <div class="card-body">
                <div class="mb-3">
                    <a href="{{ route('permissions.index') }}" class="btn btn-secondary btn-sm mb-3">
                        <i class="fas fa-arrow-left mr-3"></i>Kembali
                    </a>

                    @if(env('APP_DEBUG'))
                    <form action="{{ route('permissions.destroy', $permission) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Hapus permission ini?')">
                            <i class="fas fa-trash mr-2"></i>Hapus permission
                        </button>
                    </form>
                    @endif
                </div>
                <form action="{{ route('permissions.update', $permission) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama permission</label>
                        <input type="text" id="name" name="name" class="form-control" required value="{{ $permission->name }}">
                    </div>
                    <div class="form-group">
                        @if(env('APP_DEBUG'))
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-save mr-2"></i>
                            Simpan
                        </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
