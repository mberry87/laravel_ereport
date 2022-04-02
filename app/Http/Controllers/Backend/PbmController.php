<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pbm;
use App\Models\Bendera;
use App\Models\JenisKapal;
use App\Models\Terminal;
use Illuminate\Http\Request;

class PbmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pbm.index', [
            'pbm' => Pbm::with('bendera')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMuat()
    {
        return view('backend.pbm.create-muat', [
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
        Pbm::create($request->all() + ['input_oleh' => auth()->user()->name]);
        return redirect()->route('pbm.index')->with('sukses', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pbm  $pbm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pbm = Pbm::findOrFail($id);
        return view('backend.pbm.show', [
            'pbm' => $pbm
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pbm  $pbm
     * @return \Illuminate\Http\Response
     */
    public function editMuat($id)
    {
        $pbm = Pbm::findOrFail($id);
        return view('backend.pbm.edit-bongkar', [
            'pbm' => $pbm,
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'jenis_kapal' => JenisKapal::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pbm  $pbm
     * @return \Illuminate\Http\Response
     */
    public function updateMuat(Request $request, $id)
    {
        $pbm = Pbm::findOrFail($id);
        $pbm->update([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'ukuran_isi_kotor' => $request->ukuran_isi_kotor,
            'ukuran_dwt' => $request->ukuran_dwt,
            'ukuran_loa' => $request->ukuran_loa,
            'muat_sistem' => $request->muat_sistem,
            'muat_komidit' => $request->muat_komiditi,
            'muat_jenis' => $request->muat_jenis,
            'muat_ton' => $request->muat_ton,
            'muat_unit' => $request->muat_unit,
            'muat_m3' => $request->muat_m3,
            'id_terminal_muat' => $request->id_terminal_muat,
            'id_jenis_kapal' => $request->id_jenis_kapal,
            'agen_muat' => $request->agen_muat,
            'update_oleh' =>  auth()->user()->name,
        ]);
        return redirect()->route('pbm.index')->with('sukses', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pbm  $pbm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pbm::destroy($id);
        return redirect()->route('pbm.index')->with('hapus', 'Data berhasil dihapus');
    }

    public function createBongkar()
    {
        return view('backend.pbm.create-bongkar', [
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'jenis_kapal' => JenisKapal::all()
        ]);
    }

    public function storeBerangkat(Request $request)
    {
        Pbm::create($request->all() + ['input_oleh' => auth()->user()->name]);
        return redirect()->route('pbm.index')->with('sukses', 'Data berhasil disimpan');
    }

    public function editBerangkat($id)
    {
        $pbm = Pbm::findOrFail($id);
        return view('backend.pbm.edit-bongkar', [
            'pbm' => $pbm,
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'jenis_kapal' => JenisKapal::all()
        ]);
    }

    public function updateBerangkat(Request $request, $id)
    {
        $pbm = Pbm::findOrFail($id);
        $pbm->update([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'ukuran_isi_kotor' => $request->ukuran_isi_kotor,
            'ukuran_dwt' => $request->ukuran_dwt,
            'ukuran_loa' => $request->ukuran_loa,
            'muat_sistem' => $request->muat_sistem,
            'muat_komidit' => $request->muat_komiditi,
            'muat_jenis' => $request->muat_jenis,
            'muat_ton' => $request->muat_ton,
            'muat_unit' => $request->muat_unit,
            'muat_m3' => $request->muat_m3,
            'id_terminal_muat' => $request->id_terminal_muat,
            'id_jenis_kapal' => $request->id_jenis_kapal,
            'agen_muat' => $request->agen_berangkat,
            'update_oleh' =>  auth()->user()->name,
        ]);
        return redirect()->route('pbm.index')->with('sukses', 'Data berhasil diubah');
    }
}
