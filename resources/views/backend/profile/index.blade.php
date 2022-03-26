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
                    <h5 class="mt-3">{{ auth()->user()->name }}</h5>
                    <p class="text-success">&bull; Online</p>
                    <p class="text-secondary">Terkahir login : {{ auth()->user()->last_sign_in_at }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label>Upload Gambar</label>
                                <input type="file" class="form-control-file">
                            </div>
                        </form>
                        <br>
                        <p class="text-secondary">Info Profile</p>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nama Lengkap</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ auth()->user()->name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Perusahaan</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">-</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Handphone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">0812 00xx xxxx</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Alamat</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">Jalan Angkasa Raya no.3</p>
                            </div>
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
