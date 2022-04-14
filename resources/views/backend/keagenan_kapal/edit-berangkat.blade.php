@extends('layouts.admin')

@section('title', 'Edit Keagenan Kapal Berangkat')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Keagenan Kapal</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('keagenan_kapal.berangkat.update', $keagenan_kapal->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama kapal</label>
                                    <input type="text" name="nama_kapal" class="form-control" required
                                        value="{{ $keagenan_kapal->nama_kapal }}">
                                </div>
                                <div class="form-group">
                                    <label>Bendera</label>
                                    <select name="id_bendera" id="id_bendera" class="form-control">
                                        @foreach ($bendera as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $keagenan_kapal->id_bendera ? 'selected' : '' }}>
                                                {{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Isi kotor</label>
                                    <input type="text" name="isi_kotor" class="form-control" required
                                        value="{{ $keagenan_kapal->isi_kotor }}">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal berangkat</label>
                                    <input type="date" name="tgl_berangkat" class="form-control" required
                                        value="{{ $keagenan_kapal->tgl_berangkat }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Terminal berangkat</label>
                                    <select name="id_terminal_berangkat" id="id_terminal_berangkat" class="form-control">
                                        @foreach ($terminal as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $keagenan_kapal->id_terminal_berangkat ? 'selected' : '' }}>
                                                {{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah muatan</label>
                                    <input type="text" name="jumlah_muatan_berangkat" class="form-control" required
                                        value="{{ $keagenan_kapal->jumlah_muatan_berangkat }}">
                                </div>
                                <div class="form-group">
                                    <label>Jenis muatan</label>
                                    <input type="text" name="jenis_muatan_berangkat" class="form-control" required
                                        value="{{ $keagenan_kapal->jenis_muatan_berangkat }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Status Trayek</label>
                                            <select name="id_status_trayek" id="id_status_trayek" class="form-control">
                                                @foreach ($status_trayek as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ $data->id == $keagenan_kapal->id_status_trayek ? 'selected' : '' }}>
                                                        {{ $data->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Status Kapal</label>
                                            <select name="id_status_kapal" id="id_status_kapal" class="form-control">
                                                @foreach ($status_kapal as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ $data->id == $keagenan_kapal->id_status_kapal ? 'selected' : '' }}>
                                                        {{ $data->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Jenis Kapal</label>
                                            <select name="id_jenis_kapal" id="id_jenis_kapal" class="form-control">
                                                @foreach ($jenis_kapal as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ $data->id == $keagenan_kapal->id_jenis_kapal ? 'selected' : '' }}>
                                                        {{ $data->nama }}</option>
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
                            <a href="{{ route('keagenan_kapal.index') }}" class="btn btn-warning btn-sm ml-2">
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
