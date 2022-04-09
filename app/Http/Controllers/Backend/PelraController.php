<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pelra;
use App\Models\Bendera;
use App\Models\StatusKapal;
use App\Models\Pelabuhan;
use App\Models\StatusTrayek;
use Illuminate\Http\Request;

class PelraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            return view('backend.pelra.index', [
                'pelra' => Pelra::with('bendera')->get()
            ]);
        }
        return view('backend.pelra.index', [
            'pelra' => Pelra::with('bendera')->where('id_user', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDatang()
    {
        return view('backend.pelra.create-datang', [
            'bendera' => Bendera::all(),
            'pelabuhan' => Pelabuhan::all(),
            'status_trayek' => StatusTrayek::all(),
            'status_kapal' => StatusKapal::all(),
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
        Pelra::create($request->all() + ['input_oleh' => auth()->user()->name, 'id_user' => auth()->user()->id]);
        return redirect()->route('pelra.index')->with('sukses', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelra  $pelra
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Pelra::findOrFail($id));
        $pelra = Pelra::findOrFail($id);
        return view('backend.pelra.show', [
            'pelra' => $pelra
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelra  $pelra
     * @return \Illuminate\Http\Response
     */
    public function editDatang($id)
    {
        $this->authorize('view', Pelra::findOrFail($id));
        $pelra = Pelra::findOrFail($id);
        return view('backend.pelra.edit-datang', [
            'pelra' => $pelra,
            'bendera' => Bendera::all(),
            'pelabuhan' => Pelabuhan::all(),
            'status_trayek' => StatusTrayek::all(),
            'status_kapal' => StatusKapal::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelra  $pelra
     * @return \Illuminate\Http\Response
     */
    public function updateDatang(Request $request, $id)
    {
        $this->authorize('view', Pelra::findOrFail($id));
        $pelra = Pelra::findOrFail($id);
        $pelra->update([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_datang' => $request->tgl_datang,
            'id_pelabuhan_datang' => $request->id_pelabuhan_datang,
            'jenis_muatan_datang' => $request->jenis_muatan_datang,
            'id_status_trayek' => $request->id_status_trayek,
            'id_status_kapal' => $request->id_status_kapal,
            'bongkar_tonm3' => $request->bongkar_tonm3,
            'update_oleh' =>  auth()->user()->name,
            'id_user' => auth()->user()->id,
        ]);
        return redirect()->route('pelra.index')->with('sukses', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelra  $pelra
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('view', Pelra::findOrFail($id));
        Pelra::destroy($id);
        return redirect()->route('pelra.index')->with('hapus', 'Data berhasil dihapus');
    }

    public function createBerangkat()
    {
        return view('backend.pelra.create-berangkat', [
            'bendera' => Bendera::all(),
            'pelabuhan' => Pelabuhan::all(),
            'status_trayek' => StatusTrayek::all(),
            'status_kapal' => StatusKapal::all(),
        ]);
    }

    public function storeBerangkat(Request $request)
    {
        Pelra::create($request->all() + ['input_oleh' => auth()->user()->name, 'id_user' => auth()->user()->id]);
        return redirect()->route('pelra.index')->with('sukses', 'Data berhasil disimpan');
    }

    public function editBerangkat($id)
    {
        $this->authorize('view', Pelra::findOrFail($id));
        $pelra = Pelra::findOrFail($id);
        return view('backend.pelra.edit-berangkat', [
            'pelra' => $pelra,
            'bendera' => Bendera::all(),
            'pelabuhan' => Pelabuhan::all(),
            'status_trayek' => StatusTrayek::all(),
            'status_kapal' => StatusKapal::all(),
        ]);
    }

    public function updateBerangkat(Request $request, $id)
    {
        $this->authorize('view', Pelra::findOrFail($id));
        $pelra = Pelra::findOrFail($id);
        $pelra->update([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_pelabuhan_berangkat' => $request->id_pelabuhan_berangkat,
            'jenis_muatan_berangkat' => $request->jenis_muatan_berangkat,
            'id_status_trayek' => $request->id_status_trayek,
            'id_status_kapal' => $request->id_status_kapal,
            'muat_tonm3' => $request->muat_tonm3,
            'update_oleh' =>  auth()->user()->name,
            'id_user' => auth()->user()->id,
        ]);
        return redirect()->route('pelra.index')->with('sukses', 'Data berhasil diubah');
    }
}
