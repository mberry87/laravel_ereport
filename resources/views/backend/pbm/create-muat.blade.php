@extends('layouts.admin')

@section('title', 'Muat Data PBM')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Muat PBM</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pbm.muat.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama kapal</label>
                                    <input type="text" name="nama_kapal" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Bendera</label>
                                    <select name="id_bendera" id="id_bendera" class="form-control">
                                        @foreach ($bendera as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kapal</label>
                                    <select name="id_jenis_kapal" id="id_jenis_kapal" class="form-control">
                                        @foreach ($jenis_kapal as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label>Ukuran</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>GT</label>
                                        <input type="text" name="ukuran_isi_kotor" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>DWT</label>
                                        <input type="text" name="ukuran_dwt" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>LOA</label>
                                        <input type="text" name="ukuran_loa" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Terminal Muat</label>
                                    <select name="id_terminal_muat" id="id_terminal_muat" class="form-control">
                                        @foreach ($terminal as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
