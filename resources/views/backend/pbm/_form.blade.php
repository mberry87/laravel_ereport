<div class="card">
    <div class="card-header">Data Kapal</div>
    <div class="card-body">
        <div class="form-group">
            <label>Nama kapal</label>
            <input type="text" name="nama_kapal" class="form-control" required value="{{ old('nama_kapal', $pbm->nama_kapal) }}">
        </div>
        <div class="form-group">
            <label>Bendera</label>
            <select name="id_bendera" id="id_bendera" class="form-control">
                @foreach ($bendera as $data)
                <option value="{{ $data->id }}" {{ ($pbm->id_bendera == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Jenis Kapal</label>
            <select name="id_jenis_kapal" id="id_jenis_kapal" class="form-control">
                @foreach ($jenis_kapal as $data)
                <option value="{{ $data->id }}" {{ ($pbm->id_jenis_kapal == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Ukuran</label>
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="ukuran_isi_kotor" class="form-control" placeholder="input gt"
                        required value="{{ old('ukuran_isi_kotor', $pbm->ukuran_isi_kotor) }}">
                </div>
                <div class="col-md-4">
                    <input type="text" name="ukuran_dwt" class="form-control" placeholder="input dwt"
                        required value="{{ old('ukuran_dwt', $pbm->ukuran_dwt) }}">
                </div>
                <div class="col-md-4">
                    <input type="text" name="ukuran_loa" class="form-control" placeholder="input loa"
                        required value="{{ old('ukuran_loa', $pbm->ukuran_loa) }}">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        Data Agen
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Agen</label>
            <input type="text" name="agen" class="form-control" required value="{{ old('agen', $pbm->agen) }}">
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">Data PBM Bongkar</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Terminal bongkar</label>
                    <select name="id_terminal_bongkar" id="id_terminal_bongkar" class="form-control">
                        @foreach ($terminal as $data)
                        <option value="{{ $data->id }}" {{ ($pbm->id_terminal_bongkar == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal bongkar</label>
                    <input type="date" name="tgl_bongkar" class="form-control" required value="{{ old('tgl_bongkar', $pbm->tgl_bongkar) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>bongkar</label>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="bongkar_sistem" class="form-control"
                                placeholder="input sistem" required value="{{ old('bongkar_sistem', $pbm->bongkar_sistem) }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="bongkar_komoditi" class="form-control"
                                placeholder="input komoditi" required value="{{ old('bongkar_komoditi', $pbm->bongkar_komoditi) }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="bongkar_jenis" class="form-control"
                                placeholder="input jenis" required value="{{ old('bongkar_jenis', $pbm->bongkar_jenis) }}">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <input type="text" name="bongkar_ton" class="form-control"
                                placeholder="input ton" required value="{{ old('bongkar_ton', $pbm->bongkar_ton) }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="bongkar_unit" class="form-control"
                                placeholder="input unit" required value="{{ old('bongkar_unit', $pbm->bongkar_unit) }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="bongkar_m3" class="form-control" placeholder="input m3"
                                required value="{{ old('bongkar_m3', $pbm->bongkar_m3) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">Data PBM Muat</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Terminal Muat</label>
                    <select name="id_terminal_muat" id="id_terminal_muat" class="form-control">
                        @foreach ($terminal as $data)
                        <option value="{{ $data->id }}" {{ ($pbm->id_terminal_muat == $data->id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Muat</label>
                    <input type="date" name="tgl_muat" class="form-control" required value="{{ old('tgl_muat', $pbm->tgl_muat) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Muat</label>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="muat_sistem" class="form-control"
                                placeholder="input sistem" required value="{{ old('muat_sistem', $pbm->muat_sistem) }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="muat_komoditi" class="form-control"
                                placeholder="input komoditi" required value="{{ old('muat_komoditi', $pbm->muat_komoditi) }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="muat_jenis" class="form-control"
                                placeholder="input jenis" required value="{{ old('muat_jenis', $pbm->muat_jenis) }}">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <input type="text" name="muat_ton" class="form-control" placeholder="input ton"
                                required value="{{ old('muat_ton', $pbm->muat_ton) }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="muat_unit" class="form-control"
                                placeholder="input unit" required value="{{ old('muat_unit', $pbm->muat_unit) }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="muat_m3" class="form-control" placeholder="input m3"
                                required value="{{ old('muat_m3', $pbm->muat_m3) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
