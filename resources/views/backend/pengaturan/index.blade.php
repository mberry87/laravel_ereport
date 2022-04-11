@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Pengaturan</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
        </div>
        <div class="col-lg-4 mb-2">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pengaturan.update.data') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_sistem">Nama Sistem</label>
                            <input type="text" name="nama_sistem" id="nama_sistem" class="form-control"
                                value="{{ $pengaturan->nama_sistem }}" required>
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
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pengaturan.update.logo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="logo">Logo Sistem</label>
                            <input type="file" name="logo" id="logo" class="form-control" required>
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
