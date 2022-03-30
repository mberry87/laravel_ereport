@extends('layouts.admin')

@section('title', 'Data User')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Tambah User</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm mb-3">
                        <i class="fas fa-arrow-left mr-3"></i>Kembali
                    </a>
                    <div class="alert alert-info mt-2 mb-2">
                        Password akan digenerate otomatis sama dengan email
                    </div>
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama User</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>No.HP</label>
                            <input name="no_hp" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <input name="nama_perusahaan" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" cols="30" rows="2" class="form-control" required>-</textarea>
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
