@extends('layouts.admin')

@section('title', 'Tambah Data PELRA')

@section('breadcump')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Data PELRA</li>
    <li class="breadcrumb-item active">Tambah</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{ route('pelra.store') }}" method="POST">
            @csrf
            @include('backend.pelra._form')
            <div class="card mt-3">
                <div class="card-header">Simpan Data PELRA</div>
                <div class="card-body">
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit">
                            <i class="fas fa-save mr-3"></i>
                            Simpan
                        </button>
                        {!! Form::submit('Simpan dan Tambah Baru', array('class' => 'btn btn-secondary btn-sm', 'name' => 'submitShow')) !!}
                        <a href="{{ route('pelra.index') }}" class="btn btn-warning btn-sm ml-2">
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
