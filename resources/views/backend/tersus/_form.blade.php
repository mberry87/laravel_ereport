<div class="card mb-3">
    <div class="card-header">
        Data Kapal
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Nama kapal</label>
            <input type="text" name="nama_kapal" class="form-control" required value="{{ old('nama_kapal', $tersus->nama_kapal) }}">
        </div>
        <div class="form-group">
            <label>Bendera</label>
            <select name="id_bendera" id="id_bendera" class="form-control">
                @foreach ($bendera as $data)
                <option value="{{ $data->id }}" {{ ($tersus->id_bendera == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Isi kotor (GT)</label>
            <input type="text" name="isi_kotor" class="form-control" required value="{{ old('isi_kotor', $tersus->isi_kotor) }}">
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        Data Tersus Datang
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal datang</label>
                    <input type="date" name="tgl_datang" class="form-control" required value="{{ old('tgl_datang', $tersus->tgl_datang) }}">
                </div>
                <div class="form-group">
                    <label>Jenis muatan</label>
                    <input type="text" name="jenis_muatan_datang" class="form-control" required value="{{ old('jenis_muatan_datang', $tersus->jenis_muatan_datang) }}">
                </div>
                <div class="form-group">
                    <label>Jumlah bongkar</label>
                    <input type="text" name="jumlah_bongkar_datang" class="form-control" required value="{{ old('jumlah_bongkar_datang', $tersus->jumlah_bongkar_datang) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Dari Pelabuhan</label>
                    <select name="id_pelabuhan_datang" id="id_pelabuhan_datang" class="form-control">
                        @foreach ($pelabuhan as $data)
                        <option value="{{ $data->id }}" {{ ($tersus->id_pelabuhan_datang == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Terminal datang</label>
                    <select name="id_terminal_datang" id="id_terminal_datang" class="form-control">
                        @foreach ($terminal as $data)
                        <option value="{{ $data->id }}" {{ ($tersus->id_terminal_datang == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mt-2">
    <div class="card-header">
        Data Tersus Berangkat
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal berangkat</label>
                    <input type="date" name="tgl_berangkat" class="form-control" required value="{{ old('tgl_berangkat', $tersus->tgl_berangkat) }}">
                </div>
                <div class="form-group">
                    <label>Jumlah muatan</label>
                    <input type="text" name="jumlah_muatan_berangkat" class="form-control" required value="{{ old('jumlah_muatan_berangkat', $tersus->jumlah_muatan_berangkat) }}">
                </div>
                <div class="form-group">
                    <label>Jenis muatan</label>
                    <input type="text" name="jenis_muatan_berangkat" class="form-control" required value="{{ old('jenis_muatan_berangkat', $tersus->jenis_muatan_berangkat) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Ke Pelabuhan</label>
                    <select name="id_pelabuhan_berangkat" id="id_pelabuhan_berangkat" class="form-control">
                        @foreach ($pelabuhan as $data)
                        <option value="{{ $data->id }}" {{ ($tersus->id_pelabuhan_berangkat == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Terminal berangkat</label>
                    <select name="id_terminal_berangkat" id="id_terminal_berangkat" class="form-control">
                        @foreach ($terminal as $data)
                        <option value="{{ $data->id }}" {{ ($tersus->id_terminal_berangkat == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
