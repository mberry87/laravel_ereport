@extends('layouts.admin')

@section('title', 'Edit JPT Muat')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data JPT</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md- 12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('jpt.muat.update', $jpt->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama kapal</label>
                                    <input type="text" name="nama_kapal" class="form-control" required
                                        value="{{ $jpt->nama_kapal }}">
                                </div>
                                <div class="form-group">
                                    <label>Bendera</label>
                                    <select name="id_bendera" id="id_bendera" class="form-control">
                                        @foreach ($bendera as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $jpt->id_bendera ? 'selected' : '' }}>
                                                {{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kapal</label>
                                    <select name="id_jenis_kapal" id="id_jenis_kapal" class="form-control">
                                        @foreach ($jenis_kapal as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $jpt->id_jenis_kapal ? 'selected' : '' }}>
                                                {{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Ukuran</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="ukuran_isi_kotor" class="form-control" required
                                                    value="{{ $jpt->ukuran_isi_kotor }}" placeholder="input gt">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="ukuran_dwt" class="form-control" required
                                                    value="{{ $jpt->ukuran_dwt }}" placeholder="input dwt">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="ukuran_loa" class="form-control" required
                                                    value="{{ $jpt->ukuran_loa }}" placeholder="input loa">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Muat</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="muat_sistem" class="form-control" required
                                                    value="{{ $jpt->muat_sistem }}" placeholder="input sistem">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="muat_komoditi" class="form-control" required
                                                    value="{{ $jpt->muat_komoditi }}" placeholder="input komoditi">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="muat_jenis" class="form-control" required
                                                    value="{{ $jpt->muat_jenis }}" placeholder="input jenis">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="muat_ton" class="form-control" required
                                                    value="{{ $jpt->muat_ton }}" placeholder="input ton">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="muat_unit" class="form-control" required
                                                    value="{{ $jpt->muat_unit }}" placeholder="input unit">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="muat_m3" class="form-control" required
                                                    value="{{ $jpt->muat_m3 }}" placeholder="input m3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Terminal Muat</label>
                                    <select name="id_terminal_muat" id="id_terminal_muat" class="form-control">
                                        @foreach ($terminal as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $jpt->id_terminal_muat ? 'selected' : '' }}>
                                                {{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Tanggal Mulai</label>
                                            <input type="date" name="tgl_mulai_muat" class="form-control" required
                                                value="{{ $jpt->tgl_mulai_muat }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Tanggal Selesai</label>
                                            <input type="date" name="tgl_selesai_muat" class="form-control" required
                                                value="{{ $jpt->tgl_selesai_muat }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Perusahaan Pengirim</label>
                                            <input type="text" name="perusahaan_muat_pengirim" class="form-control"
                                                required value="{{ $jpt->perusahaan_muat_pengirim }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Perusahaan Penerima</label>
                                            <input type="text" name="perusahaan_muat_penerima" class="form-control"
                                                required value="{{ $jpt->perusahaan_muat_penerima }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Agen Muat</label>
                                    <div class="form-group">
                                        <input type="text" name="agen_muat" class="form-control" required
                                            value="{{ $jpt->agen_muat }}">
                                    </div>
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
