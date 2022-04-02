@extends('layouts.admin')

@section('title', 'Edit Data Tersus Datang')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data TERSUS</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('tersus.index') }}" class="btn btn-secondary btn-sm mb-3 mr-3">
                        <i class="fas fa-arrow-left mr-3"></i>Kembali
                    </a>
                    <form action="{{ route('tersus.datang.update', $tersus->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama kapal</label>
                                    <input type="text" name="nama_kapal" class="form-control" required
                                        value="{{ $tersus->nama_kapal }}">
                                </div>
                                <div class="form-group">
                                    <label>Bendera</label>
                                    <select name="id_bendera" id="id_bendera" class="form-control">
                                        @foreach ($bendera as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $tersus->id_bendera ? 'selected' : '' }}>
                                                {{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Isi kotor</label>
                                    <input type="text" name="isi_kotor" class="form-control" required
                                        value="{{ $tersus->isi_kotor }}">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal datang</label>
                                    <input type="date" name="tgl_datang" class="form-control" required
                                        value="{{ $tersus->tgl_datang }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dari Pelabuhan</label>
                                    <select name="id_pelabuhan_datang" id="id_pelabuhan_datang" class="form-control">
                                        @foreach ($pelabuhan as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $tersus->id_pelabuhan_datang ? 'selected' : '' }}>
                                                {{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Terminal datang</label>
                                    <select name="id_terminal_datang" id="id_terminal_datang" class="form-control">
                                        @foreach ($terminal as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $tersus->id_terminal_datang ? 'selected' : '' }}>
                                                {{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah bongkar</label>
                                    <input type="text" name="jumlah_bongkar_datang" class="form-control" required
                                        value="{{ $tersus->jumlah_bongkar_datang }}">
                                </div>
                                <div class="form-group">
                                    <label>Jenis muatan</label>
                                    <input type="text" name="jenis_muatan_datang" class="form-control" required
                                        value="{{ $tersus->jenis_muatan_datang }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">
                                <i class="fas fa-save mr-3"></i>
                                Simpan
                            </button>
                            <a href="{{ route('tersus.index') }}" class="btn btn-warning btn-sm ml-2">
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
