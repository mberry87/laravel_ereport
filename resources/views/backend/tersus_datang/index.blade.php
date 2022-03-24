@extends('layouts.admin')

@section('title', 'Data Terminal Datang')

@section('breadcump')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Tambah Terminal Datang</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('tersus.index') }}" class="btn btn-secondary btn-sm mb-3">
                        <i class="fas fa-arrow-left mr-3"></i>Kembali
                    </a>
                    <form action="{{ route('tersus_datang.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nama Kapal</label>
                                    <input type="text" class="form-control" name="nama_kapal" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Bendera</label>
                                    <select name="nama" id="" class="form-control" required>
                                        <option value="">- Pilih - </option>
                                        {{-- @foreach ($bendera as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Gross Tonnage</label>
                                    <input type="text" class="form-control" name="gt" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Berangkat</label>
                                    <input type="text" class="form-control" name="tanggal_berangkat" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Pelabuhan</label>
                                    <select name="pelabuhan_datang" id="" class="form-control" required>
                                        <option selected>- Pilih -</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Terminal</label>
                                    <select name="terminal_datang" id="" class="form-control" required>
                                        <option selected>- Pilih -</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kegiatan Bongkar</label>
                            <textarea name="keterangan" cols="30" rows="3" class="form-control">-</textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">
                                <i class="fas fa-save mr-2"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
