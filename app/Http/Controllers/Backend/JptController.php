<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Jpt;
use App\Models\Bendera;
use App\Models\JenisKapal;
use App\Models\Terminal;
use Illuminate\Http\Request;

class JptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            return view('backend.jpt.index', [
                'jpt' => Jpt::with('bendera')->get()
            ]);
        }
        return view('backend.jpt.index', [
            'pbm' => Jpt::with('bendera')->where('id_user', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMuat()
    {
        return view('backend.jpt.create-muat', [
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'jenis_kapal' => JenisKapal::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMuat(Request $request)
    {
        Jpt::create($request->all() + ['input_oleh' => auth()->user()->name, 'id_user' => auth()->user()->id]);
        return redirect()->route('jpt.index')->with('sukses', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jpt  $jpt
     * @return \Illuminate\Http\Response
     */
    public function show(Jpt $id)
    {
        $this->authorize('view', Jpt::findOrFail($id));
        $jpt = Jpt::findOrFail($id);
        return view('backend.pbm.show', [
            'jpt' => $jpt
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jpt  $jpt
     * @return \Illuminate\Http\Response
     */
    public function editMuat($id)
    {
        $this->authorize('view', Jpt::findOrFail($id));
        $jpt = Jpt::findOrFail($id);
        return view('backend.jpt.edit-muat', [
            'jpt' => $jpt,
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'jenis_kapal' => JenisKapal::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jpt  $jpt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jpt $id)
    {
        $this->authorize('view', Jpt::findOrFail($id));
        $jpt = Jpt::findOrFail($id);
        $jpt->update([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'ukuran_isi_kotor_muat' => $request->ukuran_isi_kotor_muat,
            'ukuran_dwt_muat' => $request->ukuran_dwt_muat,
            'ukuran_loa_muat' => $request->ukuran_loa_muat,
            'muat_sistem' => $request->muat_sistem,
            'muat_komoditi' => $request->muat_komoditi,
            'muat_jenis' => $request->muat_jenis,
            'muat_ton' => $request->muat_ton,
            'muat_unit' => $request->muat_unit,
            'muat_m3' => $request->muat_m3,
            'id_terminal_muat' => $request->id_terminal_muat,
            'id_jenis_kapal_muat' => $request->id_jenis_kapal_muat,
            'agen_muat' => $request->agen_muat,
            'tgl_mulai_muat' => $request->tgl_mulai_muat,
            'tgl_selesai_muat' => $request->tgl_selesai_muat,
            'perusahaan_muat_pengirim' => $request->perusahaan_muat_pengirim,
            'perusahaan_muat_penerima' => $request->perusahaan_muat_penerima,
            'update_oleh' =>  auth()->user()->name,
        ]);
        return redirect()->route('jpt.index')->with('sukses', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jpt  $jpt
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('view', Jpt::findOrFail($id));
        Jpt::destroy($id);
        return redirect()->route('jpt.index')->with('hapus', 'Data berhasil dihapus');
    }

    public function createBongkar()
    {
        return view('backend.jpt.create-bongkar', [
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'jenis_kapal' => JenisKapal::all()
        ]);
    }

    public function storeBongkar(Request $request)
    {
        Jpt::create($request->all() + ['input_oleh' => auth()->user()->name, 'id_user' => auth()->user()->id]);
        return redirect()->route('jpt.index')->with('sukses', 'Data berhasil disimpan');
    }

    public function editBongkar($id)
    {
        $this->authorize('view', Jpt::findOrFail($id));
        $jpt = Jpt::findOrFail($id);
        return view('backend.jpt.edit-bongkar', [
            'jpt' => $jpt,
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'jenis_kapal' => JenisKapal::all()
        ]);
    }

    public function updateBongkar(Request $request, $id)
    {
        $this->authorize('view', Jpt::findOrFail($id));
        $jpt = Jpt::findOrFail($id);
        $jpt->update([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'ukuran_isi_kotor_bongkar' => $request->ukuran_isi_kotor_bongkar,
            'ukuran_dwt_bongkar' => $request->ukuran_dwt_bongkar,
            'ukuran_loa_bongkar' => $request->ukuran_loa_bongkar,
            'bongkar_sistem' => $request->bongkar_sistem,
            'bongkar_komoditi' => $request->bongkar_komoditi,
            'bongkar_jenis' => $request->bongkar_jenis,
            'bongkar_ton' => $request->bongkar_ton,
            'bongkar_unit' => $request->bongkar_unit,
            'bongkar_m3' => $request->bongkar_m3,
            'id_terminal_bongkar' => $request->id_terminal_bongkar,
            'id_jenis_kapal_bongkar' => $request->id_jenis_kapal_bongkar,
            'agen_bongkar' => $request->agen_bongkar,
            'tgl_mulai_bongkar' => $request->tgl_mulai_bongkar,
            'tgl_selesai_bongkar' => $request->tgl_selesai_bongkar,
            'perusahaan_bongkar_pengirim' => $request->perusahaan_bongkar_pengirim,
            'perusahaan_bongkar_penerima' => $request->perusahaan_bongkar_penerima,
            'update_oleh' =>  auth()->user()->name,
        ]);
        return redirect()->route('pbm.index')->with('sukses', 'Data berhasil diubah');
    }
}
