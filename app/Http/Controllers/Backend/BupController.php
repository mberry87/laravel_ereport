<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bendera;
use App\Models\Pelabuhan;
use App\Models\Terminal;
use App\Models\Bup;
use Illuminate\Http\Request;

class BupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.bup.index', [
            'bup' => Bup::with('bendera')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDatang()
    {
        return view('backend.bup.create-datang', [
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'pelabuhan' => Pelabuhan::all()
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
        Bup::create($request->all() + ['input_oleh' => auth()->user()->name]);
        return redirect()->route('bup.index')->with('sukses', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bup  $bup
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tersus = Bup::findOrFail($id);
        return view('backend.bup.show', [
            'bup' => $tersus
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bup  $bup
     * @return \Illuminate\Http\Response
     */
    public function editDatang($id)
    {
        $bup = Bup::findOrFail($id);
        return view('backend.bup.edit-datang', [
            'bup' => $bup,
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'pelabuhan' => Pelabuhan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bup  $bup
     * @return \Illuminate\Http\Response
     */
    public function updateDatang(Request $request, $id)
    {
        $bup = Bup::findOrFail($id);
        $bup->update([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_datang' => $request->tgl_datang,
            'id_terminal_datang' => $request->id_terminal_datang,
            'id_pelabuhan_datang' => $request->id_pelabuhan_datang,
            'kegiatan_datang' => $request->kegiatan_datang,
            'update_oleh' =>  auth()->user()->name,
        ]);
        return redirect()->route('bup.index')->with('sukses', 'Data berhasil diubah');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bup  $bup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bup::destroy($id);
        return redirect()->route('bup.index')->with('hapus', 'Data berhasil dihapus');
    }

    public function createBerangkat()
    {
        return view('backend.bup.create-berangkat', [
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'pelabuhan' => Pelabuhan::all()
        ]);
    }

    public function storeBerangkat(Request $request)
    {

        Bup::create([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_terminal_berangkat' => $request->id_terminal_berangkat,
            'id_pelabuhan_berangkat' => $request->id_pelabuhan_berangkat,
            'kegiatan_berangkat' => $request->kegiatan_berangkat,
            'input_oleh' =>  auth()->user()->name,
        ]);
        return redirect()->route('bup.index')->with('sukses', 'Data berhasil disimpan');
    }

    public function editBerangkat($id)
    {
        $bup = Bup::findOrFail($id);
        return view('backend.bup.edit-berangkat', [
            'bup' => $bup,
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'pelabuhan' => Pelabuhan::all(),
        ]);
    }

    public function updateBerangkat(Request $request, $id)
    {
        $tersus = bup::findOrFail($id);
        $tersus->update([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_terminal_berangkat' => $request->id_terminal_berangkat,
            'id_pelabuhan_berangkat' => $request->id_pelabuhan_berangkat,
            'kegiatan_berangkat' => $request->kegiatan_berangkat,
            'update_oleh' =>  auth()->user()->name,
        ]);
        return redirect()->route('tersus.index')->with('sukses', 'Data berhasil diubah');
    }
}
