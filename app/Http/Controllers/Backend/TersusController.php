<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bendera;
use App\Models\Pelabuhan;
use App\Models\Terminal;
use App\Models\Tersus;
use Illuminate\Http\Request;

class TersusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.tersus.index', [
            'tersus' => Tersus::with('bendera')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDatang()
    {
        return view('backend.tersus.create-datang', [
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
        Tersus::create($request->all() + [
            'input_oleh' => auth()->user()->name,
            'id_user' => auth()->user()->id,
        ]);
        return redirect()->route('tersus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tersus  $tersus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tersus = Tersus::findOrFail($id);
        return view('backend.tersus.show', [
            'tersus' => $tersus
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tersus  $tersus
     * @return \Illuminate\Http\Response
     */
    public function editDatang($id)
    {
        $tersus = Tersus::findOrFail($id);
        return view('backend.tersus.edit-datang', [
            'tersus' => $tersus,
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'pelabuhan' => Pelabuhan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tersus  $tersus
     * @return \Illuminate\Http\Response
     */
    public function updateDatang(Request $request, $id)
    {
        $tersus = Tersus::findOrFail($id);
        $tersus->update([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_datang' => $request->tgl_datang,
            'id_terminal_datang' => $request->id_terminal_datang,
            'id_pelabuhan_datang' => $request->id_pelabuhan_datang,
            'jumlah_bongkar_datang' => $request->jumlah_bongkar_datang,
            'jenis_muatan_datang' => $request->jenis_muatan_datang,
            'update_oleh' =>  auth()->user()->name,
        ]);
        return redirect()->route('tersus.index')->with('sukses', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tersus  $tersus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tersus::destroy($id);
        return redirect()->route('tersus.index')->with('hapus', 'Data berhasil dihapus');
    }

    public function createBerangkat()
    {
        return view('backend.tersus.create-berangkat', [
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'pelabuhan' => Pelabuhan::all()
        ]);
    }


    public function storeBerangkat(Request $request)
    {

        Tersus::create([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_terminal_berangkat' => $request->id_terminal_berangkat,
            'id_pelabuhan_berangkat' => $request->id_pelabuhan_berangkat,
            'jumlah_muatan_berangkat' => $request->jumlah_muatan_berangkat,
            'jenis_muatan_berangkat' => $request->jenis_muatan_berangkat,
            'input_oleh' =>  auth()->user()->name,
            'id_user' => auth()->user()->id,
        ]);
        return redirect()->route('tersus.index')->with('sukses', 'Data berhasil disimpan');
    }

    public function editBerangkat($id)
    {
        $tersus = Tersus::findOrFail($id);
        return view('backend.tersus.edit-berangkat', [
            'tersus' => $tersus,
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'pelabuhan' => Pelabuhan::all(),
        ]);
    }

    public function updateBerangkat(Request $request, $id)
    {
        $tersus = Tersus::findOrFail($id);
        $tersus->update([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_terminal_berangkat' => $request->id_terminal_berangkat,
            'id_pelabuhan_berangkat' => $request->id_pelabuhan_berangkat,
            'jumlah_muatan_berangkat' => $request->jumlah_muatan_berangkat,
            'jenis_muatan_berangkat' => $request->jenis_muatan_berangkat,
            'update_oleh' =>  auth()->user()->name,
        ]);
        return redirect()->route('tersus.index')->with('sukses', 'Data berhasil diubah');
    }
}
