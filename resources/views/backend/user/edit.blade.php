@extends('layouts.admin')

@section('title', 'Edit User')

@section('breadcump')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active">Edit User</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm mb-3">
                    <i class="fas fa-arrow-left mr-3"></i>Kembali
                </a>
                <form action="{{ route('user.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group">
                        <label>No.HP</label>
                        <input name="no_hp" type="text" class="form-control" required value="{{ $user->no_hp }}">
                    </div>
                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input name="nama_perusahaan" type="text" class="form-control" required required
                            value="{{ $user->nama_perusahaan }}">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option value="admin" {{ ($user->role == "admin") ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ ($user->role == "user") ? 'selected' : '' }}>User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option value="aktif" {{ ($user->status == "aktif") ? 'selected' : '' }}>Aktif</option>
                            <option value="suspend" {{ ($user->status == "suspend") ? 'selected' : '' }}>Suspend
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" cols="30" rows="2" class="form-control"
                            required>{{ $user->alamat }}</textarea>
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
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Permission user
            </div>
            <div class="card-body">
                <form action="{{ route('user.permission.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}" required>
                    <div class="form-group">
                        <label for="permission">Permissions</label>
                        <select name="permission[]" id="permission" class="form-control" multiple="multiple">
                            @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}"
                                {{ (isset($user) && $user->permissions->contains($permission->id)) ? 'selected' : '' }}>{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-3"></i>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
            color: black;
        }
    </style>
@endpush
@push('js')
<script>
    $(document).ready(function () {
        $('#permission').select2();
    });

</script>
@endpush
