@extends('layouts.admin')

@section('title', 'Edit Keagenan Kapal')

@section('breadcump')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Data Keagenan Kapal</li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{ route('keagenan_kapal.update', $keagenan_kapal->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('backend.keagenan_kapal._form')
            <div class="card mt-3">
                <div class="card-header">
                    Simpan Data Keagenan Kapal
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit">
                            <i class="fas fa-save mr-3"></i>
                            Simpan
                        </button>
                        <a href="{{ route('keagenan_kapal.index') }}" class="btn btn-warning btn-sm ml-2">
                            <i class="fas fa-times mr-3"></i>
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
