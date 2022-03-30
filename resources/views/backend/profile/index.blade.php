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
    <div class="col-12">
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                {{ $message }}
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                {{ $message }}
            </div>
        @endif
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body text-center">
                @if (auth()->user()->avatar == null)
                <img src="https://ui-avatars.com/api/?size=128&name={{ auth()->user()->name }}" class="user-image img-circle elevation-2" alt="img">
                @else
                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="user-image img-circle elevation-2"
                    width="128" alt="img">
                @endif
                <form action="{{ route('profile.update.avatar', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group my-4">
                        <label for="avatar">Upload Gambar</label>
                        <input type="file" class="form-control-file" @error('avatar') is-invalid @enderror name="avatar">
                        @error('avatar')
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
                    <form action="{{ route('profile.update.data', auth()->user()->id) }}" method="POST">
                        @csrf
                        @method('PUT')
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
                            <input type="text" class="form-control" name="no_hp" value="{{ auth()->user()->no_hp }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <input type="text" class="form-control" name="nama_perusahaan" value="{{ auth()->user()->nama_perusahaan }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea type="text" class="form-control" name="alamat"
                                rows="3" required>{{ auth()->user()->alamat }}</textarea>
                        </div>
                </div>
                <button class="btn btn-primary btn-sm mr-3" type="submit">
                    <i class="fas fa-undo"></i>
                    Update Profile
                </button>
                <a href="{{ route('dashboard.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left mr-3"></i>Kembali
                </a>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Update Password
            </div>
            <div class="card-body">
                <form action="{{ route('profile.update.password', auth()->user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Password baru</label>
                        <input type="password" name="password1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password baru</label>
                        <input type="password" name="password2" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-key mr-2"></i>
                            Update password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
