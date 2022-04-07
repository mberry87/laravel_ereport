@extends('layouts.admin')

@section('title', 'Muat Data JPT')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Muat JPT</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('jpt.muat.store') }}" method="POST">
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
                                    <select name="id_jenis_kapal_muat" id="id_jenis_muat" class="form-control">
                                        @foreach ($jenis_kapal as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ukuran</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" name="ukuran_isi_kotor_muat" class="form-control"
                                                placeholder="input gt" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="ukuran_dwt_muat" class="form-control"
                                                placeholder="input dwt" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="ukuran_loa_muat" class="form-control"
                                                placeholder="input loa" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Muat</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" name="muat_sistem" class="form-control"
                                                placeholder="input sistem" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="muat_komoditi" class="form-control"
                                                placeholder="input komoditi" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="muat_jenis" class="form-control"
                                                placeholder="input jenis" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            <input type="text" name="muat_ton" class="form-control"
                                                placeholder="input ton" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="muat_unit" class="form-control"
                                                placeholder="input unit" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="muat_m3" class="form-control" placeholder="input m3"
                                                required>
                                        </div>
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Mulai</label>
                                            <input type="date" name="tgl_mulai_muat" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Selesai</label>
                                            <input type="date" name="tgl_selesai_muat" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Perushaan Pengirim</label>
                                            <input type="text" name="perusahaan_muat_pengirim" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Perushaan Penerima</label>
                                            <input type="text" name="perusahaan_muat_penerima" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Agen</label>
                                    <input type="text" name="agen_muat" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">
                                <i class="fas fa-save mr-3"></i>
                                Simpan
                            </button>
                            <a href="{{ route('jpt.index') }}" class="btn btn-warning btn-sm ml-2">
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
