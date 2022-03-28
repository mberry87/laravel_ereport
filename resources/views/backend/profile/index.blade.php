@extends('layouts.admin')

@section('title', 'Profile')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Profile</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset('image') }}/avatar.jpeg" alt="avatar" class="rounded-circle img-fluid"
                        style="width: 150px;">
                    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group my-4">
                            <label for="image">Upload Gambar</label>
                            <input type="file" class="form-control-file" @error('image') is-invalid @enderror name="image">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-sm mr-3" type="submit">
                            <i class="fas fa-undo"></i>
                            Update Gambar
                        </button>
                    </form>
                    <h5 class="mt-3">{{ auth()->user()->name }}</h5>
                    <p class="text-success">&bull; Online</p>
                    <p class="text-secondary">Terkahir login : <span
                            class="text-danger">{{ auth()->user()->last_login_time }}</span></p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-body">
                        <p class="text-secondary">Info Profile</p>
                        <hr>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Alamat Email</label>
                            <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Handphone</label>
                            <input type="text" class="form-control" name="name" value="{{ auth()->user()->handphone }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <input type="text" class="form-control" name="name" value="{{ auth()->user()->Company }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <input type="text" class="form-control" name="name" value="{{ auth()->user()->address }}"
                                required>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm mr-3" type="submit">
                        <i class="fas fa-undo"></i>
                        Update Profile
                    </button>
                    <a href="{{ route('dashboard.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left mr-3"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
