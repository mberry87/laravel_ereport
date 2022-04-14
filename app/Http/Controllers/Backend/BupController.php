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
        if (auth()->user()->role == 'admin') {
            return view('backend.bup.index', [
                'bup' => Bup::with('bendera')->get()
            ]);
        }
        return view('backend.bup.index', [
            'bup' => Bup::with('bendera')->where('id_user', auth()->user()->id)->get()
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
        $bup = Bup::create($request->all() + ['input_oleh' => auth()->user()->name, 'id_user' => auth()->user()->id]);
        storeLog(route('bup.show', $bup->id), "User " . auth()->user()->name . " menambah data BUP");
        return redirect()->route('bup.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bup  $bup
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Bup::findOrFail($id));
        $bup = Bup::findOrFail($id);
        return view('backend.bup.show', [
            'bup' => $bup
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
        $this->authorize('view', Bup::findOrFail($id));
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
        $this->authorize('view', Bup::findOrFail($id));
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
        storeLog(route('bup.show', $bup->id), "User " . auth()->user()->name . " mengubah data BUP");
        return redirect()->route('bup.index')->with('success', 'Data berhasil diubah');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bup  $bup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->delete == 'true') {
            $this->authorize('view', Bup::findOrFail($id));
            Bup::destroy($id);
            storeLog(null, "User " . auth()->user()->name . " menghapus data BUP");
            return redirect()->route('bup.index')->with('success', 'Data berhasil dihapus');
        }
        alert()->error('Gagal', 'Data gagal dihapus');
        return redirect()->route('bup.index');
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
        $bup = Bup::create([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_terminal_berangkat' => $request->id_terminal_berangkat,
            'id_pelabuhan_berangkat' => $request->id_pelabuhan_berangkat,
            'kegiatan_berangkat' => $request->kegiatan_berangkat,
            'input_oleh' =>  auth()->user()->name,
            'id_user' => auth()->user()->id,
        ]);
        storeLog(route('bup.show', $bup->id), "User " . auth()->user()->name . " menambah data BUP");
        return redirect()->route('bup.index')->with('success', 'Data berhasil disimpan');
    }

    public function editBerangkat($id)
    {
        $this->authorize('view', Bup::findOrFail($id));
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
        $this->authorize('view', Bup::findOrFail($id));
        $bup = bup::findOrFail($id);
        $bup->update([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_terminal_berangkat' => $request->id_terminal_berangkat,
            'id_pelabuhan_berangkat' => $request->id_pelabuhan_berangkat,
            'kegiatan_berangkat' => $request->kegiatan_berangkat,
            'update_oleh' =>  auth()->user()->name,
        ]);
        storeLog(route('bup.show', $bup->id), "User " . auth()->user()->name . " mengubah data BUP");
        return redirect()->route('bup.index')->with('success', 'Data berhasil diubah');
    }
}
