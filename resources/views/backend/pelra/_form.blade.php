<div class="card">
    <div class="card-header">Data Kapal</div>
    <div class="card-body">
        <div class="form-group">
            <label>Nama kapal</label>
            <input type="text" name="nama_kapal" class="form-control" required value="{{ old('nama_kapal', $pelra->nama_kapal) }}">
        </div>
        <div class="form-group">
            <label>Bendera</label>
            <select name="id_bendera" id="id_bendera" class="form-control">
                @foreach ($bendera as $data)
                <option value="{{ $data->id }}" {{ ($pelra->id_bendera == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Isi kotor (GT)</label>
            <input type="text" name="isi_kotor" class="form-control" required value="{{ old('isi_kotor', $pelra->isi_kotor) }}">
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label>Status Trayek</label>
                    <select name="id_status_trayek" id="id_status_trayek" class="form-control">
                        @foreach ($status_trayek as $data)
                        <option value="{{ $data->id }}" {{ ($pelra->id_status_trayek == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Status Kapal</label>
                    <select name="id_status_kapal" id="id_status_kapal" class="form-control">
                        @foreach ($status_kapal as $data)
                        <option value="{{ $data->id }}" {{ ($pelra->id_status_kapal == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">Data PELRA Datang</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal datang</label>
                    <input type="date" name="tgl_datang" class="form-control" required value="{{ old('tgl_datang', $pelra->tgl_datang) }}">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Jenis muatan</label>
                            <input type="text" name="jenis_muatan_datang" class="form-control" required value="{{ old('jenis_muatan_datang', $pelra->jenis_muatan_datang) }}">
                        </div>
                        <div class="col-md-6">
                            <label>Bongkar</label>
                            <input type="text" name="bongkar_tonm3" class="form-control" required value="{{ old('bongkar_tonm3', $pelra->bongkar_tonm3) }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Dari Pelabuhan</label>
                    <select name="id_pelabuhan_datang" id="id_pelabuhan_datang" class="form-control">
                        @foreach ($pelabuhan as $data)
                        <option value="{{ $data->id }}" {{ ($pelra->id_pelabuhan_datang == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">Data PELRA Berangkat</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal berangkat</label>
                    <input type="date" name="tgl_berangkat" class="form-control" required value="{{ old('tgl_berangkat', $pelra->tgl_berangkat) }}">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Jenis muatan</label>
                            <input type="text" name="jenis_muatan_berangkat" class="form-control" required value="{{ old('jenis_muatan_berangkat', $pelra->jenis_muatan_berangkat) }}">
                        </div>
                        <div class="col-md-6">
                            <label>Muat</label>
                            <input type="text" name="muat_tonm3" class="form-control" required value="{{ old('muat_tonm3', $pelra->muat_tonm3) }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Dari Pelabuhan</label>
                    <select name="id_pelabuhan_berangkat" id="id_pelabuhan_berangkat" class="form-control">
                        @foreach ($pelabuhan as $data)
                        <option value="{{ $data->id }}" {{ ($pelra->id_pelabuhan_berangkat == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
