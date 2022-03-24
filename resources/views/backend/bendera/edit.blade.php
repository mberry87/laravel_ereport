@extends('layouts.admin')

@section('title', 'Edit Bendera')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Bendera</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('bendera.index') }}" class="btn btn-secondary btn-sm mb-3">
                        <i class="fas fa-arrow-left mr-3"></i>Kembali
                    </a>
                    <form action="{{ route('bendera.update', $bendera) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Bendera</label>
                            <input type="text" class="form-control" name="nama" value="{{ $bendera->nama }}" required>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" cols="30" rows="4" class="form-control">{{ $bendera->keterangan }}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">
                                <i class="fas fa-save mr-2"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
