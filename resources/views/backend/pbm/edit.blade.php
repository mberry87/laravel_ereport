@extends('layouts.admin')

@section('title', 'Edit Data PBM')

@section('breadcump')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Data PBM</li>
    <li class="breadcrumb-item">Edit</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{ route('pbm.update', $pbm->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('backend.pbm._form')
            <div class="card mt-3">
                <div class="card-header">Simpan Data PBM</div>
                <div class="card-body">
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit">
                            <i class="fas fa-save mr-3"></i>
                            Simpan
                        </button>
                        <a href="{{ route('pbm.index') }}" class="btn btn-warning btn-sm ml-2">
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
