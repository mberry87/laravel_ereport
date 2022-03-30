<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bendera;
use App\Models\JenisKapal;
use App\Models\Pelabuhan;
use App\Models\Terminal;
use App\Models\Pelnas;
use App\Models\StatusTrayek;
use Illuminate\Http\Request;

class PelnasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pelnas.index', [
            'pelnas' => Pelnas::with('bendera')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDatang()
    {
        return view('backend.pelnas.create-datang', [
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'pelabuhan' => Pelabuhan::all(),
            'status_trayek' => StatusTrayek::all(),
            'jenis_kapal' => JenisKapal::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDatang(Request $request)
    {
        Pelnas::create($request->all() + ['input_oleh' => auth()->user()->name]);
        return redirect()->route('pelnas.index')->with('sukses', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelnas  $pelnas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelnas = Pelnas::findOrFail($id);
        return view('backend.pelnas.show', [
            'pelnas' => $pelnas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelnas  $pelnas
     * @return \Illuminate\Http\Response
     */
    public function editDatang($id)
    {
        $pelnas = Pelnas::findOrFail($id);
        return view('backend.pelnas.edit-datang', [
            'pelnas' => $pelnas,
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'pelabuhan' => Pelabuhan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelnas  $pelnas
     * @return \Illuminate\Http\Response
     */
    public function updateDatang(Request $request, $id)
    {
        $pelnas = Pelnas::findOrFail($id);
        $pelnas->update([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_datang' => $request->tgl_datang,
            'id_terminal_datang' => $request->id_terminal_datang,
            'id_pelabuhan_datang' => $request->id_pelabuhan_datang,
            'jumlah_bongkar_datang' => $request->jumlah_bongkar_datang,
            'jenis_muatan_datang' => $request->jenis_muatan_datang,
            'id_status_trayek_datang' => $request->id_status_trayek_datang,
            'id_jenis_kapal_datang' => $request->id_jenis_kapal_datang,
            'update_oleh' =>  auth()->user()->name,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelnas  $pelnas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelnas::destroy($id);
        return redirect()->route('pelnas.index')->with('hapus', 'Data berhasil dihapus');
    }

    public function createBerangkat()
    {
        return view('backend.pelnas.create-berangkat', [
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'pelabuhan' => Pelabuhan::all(),
            'status_trayek' => StatusTrayek::all(),
            'jenis_kapal' => JenisKapal::all()
        ]);
    }

    public function storeBerangkat(Request $request)
    {

        Pelnas::create([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_terminal_berangkat' => $request->id_terminal_berangkat,
            'id_pelabuhan_berangkat' => $request->id_pelabuhan_berangkat,
            'jumlah_muatan_berangkat' => $request->jumlah_muatan_berangkat,
            'jenis_muatan_berangkat' => $request->jenis_muatan_berangkat,
            'id_status_trayek_berangkat' => $request->id_status_trayek_berangkat,
            'id_jenis_kapal_berangkat' => $request->id_jenis_kapal_berangkat,
            'input_oleh' =>  auth()->user()->name,
        ]);
        return redirect()->route('pelnas.index')->with('sukses', 'Data berhasil disimpan');
    }

    public function editBerangkat($id)
    {
        $pelnas = Pelnas::findOrFail($id);
        return view('backend.pelnas.edit-berangkat', [
            'pelnas' => $pelnas,
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'pelabuhan' => Pelabuhan::all(),
            'terminal' => Terminal::all(),
            'pelabuhan' => Pelabuhan::all(),
        ]);
    }

    public function updateBerangkat(Request $request, $id)
    {
        $pelnas = Pelnas::findOrFail($id);
        $pelnas->update([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_terminal_berangkat' => $request->id_terminal_berangkat,
            'id_pelabuhan_berangkat' => $request->id_pelabuhan_berangkat,
            'jumlah_muatan_berangkat' => $request->jumlah_muatan_berangkat,
            'jenis_muatan_berangkat' => $request->jenis_muatan_berangkat,
            'id_status_trayek_berangkat' => $request->id_status_trayek_berangkat,
            'id_jenis_kapal_berangkat' => $request->id_jenis_kapal_berangkat,
            'update_oleh' =>  auth()->user()->name,
        ]);
        return redirect()->route('pelnas.index')->with('sukses', 'Data berhasil diubah');
    }
}
