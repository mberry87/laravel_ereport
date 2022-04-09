@extends('layouts.admin')

@section('title', 'Tambah PELRA Berangkat')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data PELRA</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pelra.berangkat.store') }}" method="POST">
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
                                    <label>Isi kotor (GT)</label>
                                    <input type="text" name="isi_kotor" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal berangkat</label>
                                    <input type="date" name="tgl_berangkat" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Dari Pelabuhan</label>
                                    <select name="id_pelabuhan_berangkat" id="id_pelabuhan_berangkat"
                                        class="form-control">
                                        @foreach ($pelabuhan as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Jenis muatan</label>
                                            <input type="text" name="jenis_muatan_berangkat" class="form-control"
                                                required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Muat</label>
                                            <input type="text" name="muat_tonm3" class="form-control" required
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Status Trayek</label>
                                            <select name="id_status_trayek" id="id_status_trayek" class="form-control">
                                                @foreach ($status_trayek as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Status Kapal</label>
                                            <select name="id_status_kapal" id="id_status_kapal" class="form-control">
                                                @foreach ($status_kapal as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">
                                <i class="fas fa-save mr-3"></i>
                                Simpan
                            </button>
                            <a href="{{ route('pelra.index') }}" class="btn btn-warning btn-sm ml-2">
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
