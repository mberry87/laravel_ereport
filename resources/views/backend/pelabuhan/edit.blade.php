@extends('layouts.admin')

@section('title', 'Edit Pelabuhan')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Pelabuhan</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('pelabuhan.index') }}" class="btn btn-secondary btn-sm mb-3">
                        <i class="fas fa-arrow-left mr-3"></i>Kembali
                    </a>
                    <form action="{{ route('pelabuhan.update', $pelabuhan) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Kode</label>
                            <input type="text" class="form-control" name="kode" value="{{ $pelabuhan->kode }}" required>
                        </div>

                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Pelabuahan</label>
                            <input type="text" class="form-control" name="nama" value="{{ $pelabuhan->nama }}" required>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" cols="30" rows="4" class="form-control">{{ $pelabuhan->keterangan }}</textarea>
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
