<div class="card">
    <div class="card-header">
        Data Kapal
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Nama kapal</label>
            <input type="text" name="nama_kapal" class="form-control" required value="{{ old('nama_kapal', $bup->nama_kapal) }}">
        </div>
        <div class="form-group">
            <label>Bendera</label>
            <select name="id_bendera" id="id_bendera" class="form-control">
                @foreach ($bendera as $data)
                <option value="{{ $data->id }}" {{ ($bup->id_bendera == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Isi kotor</label>
            <input type="text" name="isi_kotor" class="form-control" required value="{{ old('isi_kotor', $bup->isi_kotor) }}">
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        Data BUP Datang
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal datang</label>
                    <input type="date" name="tgl_datang" class="form-control" required value="{{ old('tgl_datang', $bup->tgl_datang) }}">
                </div>
                <div class="form-group">
                    <label>Kegiatan Datang</label>
                    <textarea type="text" name="kegiatan_datang" class="form-control" rows="4"
                        required>{{ old('kegiatan_datang', $bup->kegiatan_datang) }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Dari Pelabuhan</label>
                    <select name="id_pelabuhan_datang" id="id_pelabuhan_datang" class="form-control">
                        @foreach ($pelabuhan as $data)
                        <option value="{{ $data->id }}" {{ ($bup->id_pelabuhan_datang == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Terminal datang</label>
                    <select name="id_terminal_datang" id="id_terminal_datang" class="form-control">
                        @foreach ($terminal as $data)
                        <option value="{{ $data->id }}" {{ ($bup->id_terminal_datang == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        Data BUP Berangkat
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal berangkat</label>
                    <input type="date" name="tgl_berangkat" class="form-control" required value="{{ old('tgl_berangkat', $bup->tgl_berangkat) }}">
                </div>
                <div class="form-group">
                    <label>Kegiatan Berangkat</label>
                    <textarea type="text" name="kegiatan_berangkat" class="form-control" required
                        rows="4">{{ old('kegiatan_berangkat', $bup->kegiatan_berangkat) }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Ke Pelabuhan</label>
                    <select name="id_pelabuhan_berangkat" id="id_pelabuhan_berangkat" class="form-control">
                        @foreach ($pelabuhan as $data)
                        <option value="{{ $data->id }}" {{ ($bup->id_pelabuhan_berangkat == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Terminal berangkat</label>
                    <select name="id_terminal_berangkat" id="id_terminal_berangkat" class="form-control">
                        @foreach ($terminal as $data)
                        <option value="{{ $data->id }}" {{ ($bup->id_terminal_berangkat == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
