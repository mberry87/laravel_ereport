@extends('layouts.admin')

@section('title', 'Pemberitahuan')

@section('breadcump')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item">Permission</li>
    <li class="breadcrumb-item active">Tambah permission</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Tambah Data Permission</div>
            <div class="card-body">
                <a href="{{ route('permissions.index') }}" class="btn btn-secondary btn-sm mb-3">
                    <i class="fas fa-arrow-left mr-3"></i>Kembali
                </a>
                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama permission</label>
                        <input type="text" id="name" name="name" class="form-control" required>
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
