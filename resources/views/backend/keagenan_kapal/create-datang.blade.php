@extends('layouts.admin')

@section('title', 'Tambah Keagenan Kapal Datang')

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
                    <form action="{{ route('keagenan_kapal.datang.store') }}" method="POST">
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
                                    <label>Isi kotor</label>
                                    <input type="text" name="isi_kotor" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal datang</label>
                                    <input type="date" name="tgl_datang" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Status Trayek</label>
                                    <select name="id_status_trayek_datang" id="id_status_trayek_datang"
                                        class="form-control">
                                        @foreach ($status_trayek as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Dari Pelabuhan</label>
                                    <select name="id_pelabuhan_datang" id="id_pelabuhan_datang" class="form-control">
                                        @foreach ($pelabuhan as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Terminal datang</label>
                                    <select name="id_terminal_datang" id="id_terminal_datang" class="form-control">
                                        @foreach ($terminal as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah bongkar</label>
                                    <input type="text" name="jumlah_bongkar_datang" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis muatan</label>
                                    <input type="text" name="jenis_muatan_datang" class="form-control" required>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Status Kapal</label>
                                            <select name="id_status_kapal_datang" id="id_status_kapal_datang"
                                                class="form-control">
                                                @foreach ($status_kapal as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Jenis Kapal</label>
                                            <select name="id_jenis_kapal_datang" id="id_jenis_kapal_datang"
                                                class="form-control">
                                                @foreach ($jenis_kapal as $data)
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
