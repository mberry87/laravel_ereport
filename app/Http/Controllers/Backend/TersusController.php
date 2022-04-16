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
                        ->latest()
                        ->get()
                ]);
            }
            return view('backend.tersus.index', [
                'tersus' => Tersus::with('bendera')
                    ->where('id_user', auth()->user()->id)
                    ->whereBetween('tgl_datang', [$request->tanggal_awal, $request->tanggal_akhir])
                    ->orWhereBetween('tgl_berangkat', [$request->tanggal_awal, $request->tanggal_akhir])
                    ->latest()
                    ->get()
            ]);
        }
        if (auth()->user()->role == 'admin') {
            return view('backend.tersus.index', [
                'tersus' => Tersus::with('bendera')
                    ->latest()->get()
            ]);
        }
        return view('backend.tersus.index', [
            'tersus' => Tersus::with('bendera')->where('id_user', auth()->user()->id)
                ->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tersus.create', [
            'tersus' => new Tersus(),
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
    public function store(Request $request)
    {
        $tersus = Tersus::create([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_datang' => $request->tgl_datang,
            'id_terminal_datang' => $request->id_terminal_datang,
            'id_pelabuhan_datang' => $request->id_pelabuhan_datang,
            'jumlah_bongkar_datang' => $request->jumlah_bongkar_datang,
            'jenis_muatan_datang' => $request->jenis_muatan_datang,
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_terminal_berangkat' => $request->id_terminal_berangkat,
            'id_pelabuhan_berangkat' => $request->id_pelabuhan_berangkat,
            'jumlah_muatan_berangkat' => $request->jumlah_muatan_berangkat,
            'jenis_muatan_berangkat' => $request->jenis_muatan_berangkat,
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
    public function edit($id)
    {
        $this->authorize('view', Tersus::findOrFail($id));
        $tersus = Tersus::findOrFail($id);
        return view('backend.tersus.edit', [
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
    public function update(Request $request, $id)
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
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_terminal_berangkat' => $request->id_terminal_berangkat,
            'id_pelabuhan_berangkat' => $request->id_pelabuhan_berangkat,
            'jumlah_muatan_berangkat' => $request->jumlah_muatan_berangkat,
            'jenis_muatan_berangkat' => $request->jenis_muatan_berangkat,
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

    public function cetakLaporan(Request $request)
    {
        $data = array();
        if (auth()->user()->role == 'admin') {
            $data = Tersus::whereBetween('tgl_datang', [$request->tgl_awal, $request->tgl_akhir])
                ->orWhereBetween('tgl_berangkat', [$request->tgl_awal, $request->tgl_akhir])
                ->get();
        } else {
            $rawData = Tersus::where('id_user', auth()->user()->id)
                ->whereBetween('tgl_datang', [$request->tgl_awal, $request->tgl_akhir])
                ->orWhereBetween('tgl_berangkat', [$request->tgl_awal, $request->tgl_akhir])
                ->get();

            foreach ($rawData as $d) {
                if ($d->id_user == auth()->user()->id) {
                    $data[] = $d;
                }
            }
        }
        $pdf = PDF::loadView('backend.tersus.laporan', [
            'data' => $data
        ]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('Tersus-' . time() . ".pdf");
    }
}
