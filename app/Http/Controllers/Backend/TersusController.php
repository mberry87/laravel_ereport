<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bendera;
use App\Models\Pelabuhan;
use App\Models\Terminal;
use App\Models\Tersus;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TersusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filter && $request->tanggal_awal && $request->tanggal_akhir) {
            if (auth()->user()->role == 'admin') {
                return view('backend.tersus.index', [
                    'tersus' => Tersus::with('bendera')
                        ->whereBetween('tgl_datang', [$request->tanggal_awal, $request->tanggal_akhir])
                        ->orWhereBetween('tgl_berangkat', [$request->tanggal_awal, $request->tanggal_akhir])
                        ->get()
                ]);
            }
            return view('backend.tersus.index', [
                'tersus' => Tersus::with('bendera')
                    ->where('id_user', auth()->user()->id)
                    ->whereBetween('tgl_datang', [$request->tanggal_awal, $request->tanggal_akhir])
                    ->orWhereBetween('tgl_berangkat', [$request->tanggal_awal, $request->tanggal_akhir])
                    ->get()
            ]);
        }
        if (auth()->user()->role == 'admin') {
            return view('backend.tersus.index', [
                'tersus' => Tersus::with('bendera')->get()
            ]);
        }
        return view('backend.tersus.index', [
            'tersus' => Tersus::with('bendera')->where('id_user', auth()->user()->id)->get()
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
        $tersus = Tersus::create($request->all() + [
            'input_oleh' => auth()->user()->name,
            'id_user' => auth()->user()->id,
        ]);
        storeLog(route('tersus.show', $tersus->id), "User " . auth()->user()->name . " menambahkan data tersus");
        return redirect()->route('tersus.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tersus  $tersus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Tersus::findOrFail($id));
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
        $this->authorize('view', Tersus::findOrFail($id));
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
        $this->authorize('view', Tersus::findOrFail($id));
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
        storeLog(route('tersus.show', $tersus->id), "User " . auth()->user()->name . " mengubah data tersus");
        return redirect()->route('tersus.index')->with('info', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tersus  $tersus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->delete == 'true') {
            $this->authorize('view', Tersus::findOrFail($id));
            Tersus::destroy($id);
            storeLog(null, "User " . auth()->user()->name . " menghapus data tersus");
            return redirect()->route('tersus.index')->with('success', 'Data berhasil dihapus');
        }
        alert()->error('Gagal', 'Data gagal dihapus');
        return redirect()->route('tersus.index');
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
        $tersus = Tersus::create([
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
        storeLog(route('tersus.show', $tersus->id), "User " . auth()->user()->name . " menambahkan data tersus");
        return redirect()->route('tersus.index')->with('success', 'Data berhasil disimpan');
    }

    public function editBerangkat($id)
    {
        $this->authorize('view', Tersus::findOrFail($id));
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
        $this->authorize('view', Tersus::findOrFail($id));
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

        storeLog(route('tersus.show', $tersus->id), "User " . auth()->user()->name . " mengubah data tersus");
        return redirect()->route('tersus.index')->with('info', 'Data berhasil diubah');
    }

    public function cetakLaporan(Request $request)
    {
        $data = null;
        if (auth()->user()->role == 'admin') {
            $data = Tersus::whereBetween('tgl_datang', [$request->tgl_awal, $request->tgl_akhir])
                ->orWhereBetween('tgl_berangkat', [$request->tgl_awal, $request->tgl_akhir])
                ->get();
        } else {
            $data = Tersus::where('id_user', auth()->user()->id)
                ->whereBetween('tgl_datang', [$request->tgl_awal, $request->tgl_akhir])
                ->orWhereBetween('tgl_berangkat', [$request->tgl_awal, $request->tgl_akhir])
                ->get();
        }
        $pdf = PDF::loadView('backend.tersus.laporan', [
            'data' => $data
        ]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('Tersus-' . time() . ".pdf");
    }
}
