<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pbm;
use App\Models\Bendera;
use App\Models\JenisKapal;
use App\Models\Terminal;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PbmController extends Controller
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
                return view('backend.pbm.index', [
                    'pbm' => PBM::with('bendera')
                        ->whereBetween('tgl_muat', [$request->tanggal_awal, $request->tanggal_akhir])
                        ->orWhereBetween('tgl_bongkar', [$request->tanggal_awal, $request->tanggal_akhir])
                        ->latest()
                        ->get()
                ]);
            }
            return view('backend.pbm.index', [
                'pbm' => PBM::with('bendera')
                    ->where('id_user', auth()->user()->id)
                    ->whereBetween('tgl_muat', [$request->tanggal_awal, $request->tanggal_akhir])
                    ->orWhereBetween('tgl_bongkar', [$request->tanggal_awal, $request->tanggal_akhir])
                    ->latest()
                    ->get()
            ]);
        }
        if (auth()->user()->role == 'admin') {
            return view('backend.pbm.index', [
                'pbm' => Pbm::with('bendera')->latest()->get()
            ]);
        }
        return view('backend.pbm.index', [
            'pbm' => Pbm::with('bendera')->where('id_user', auth()->user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pbm.create', [
            'pbm' => new Pbm(),
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
    public function store(Request $request)
    {
        $pbm = Pbm::create([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'id_jenis_kapal' => $request->id_jenis_kapal,
            'agen' => $request->agen,
            'ukuran_isi_kotor' => $request->ukuran_isi_kotor,
            'ukuran_dwt' => $request->ukuran_dwt,
            'ukuran_loa' => $request->ukuran_loa,
            'tgl_muat' => $request->tgl_muat,
            'muat_sistem' => $request->muat_sistem,
            'muat_komoditi' => $request->muat_komoditi,
            'muat_jenis' => $request->muat_jenis,
            'muat_ton' => $request->muat_ton,
            'muat_unit' => $request->muat_unit,
            'muat_m3' => $request->muat_m3,
            'id_terminal_muat' => $request->id_terminal_muat,
            'tgl_bongkar' => $request->tgl_bongkar,
            'bongkar_sistem' => $request->bongkar_sistem,
            'bongkar_komoditi' => $request->bongkar_komoditi,
            'bongkar_jenis' => $request->bongkar_jenis,
            'bongkar_ton' => $request->bongkar_ton,
            'bongkar_unit' => $request->bongkar_unit,
            'bongkar_m3' => $request->bongkar_m3,
            'id_terminal_bongkar' => $request->id_terminal_bongkar,
            'id_user' => auth()->user()->id,
        ]);
        storeLog(route('pbm.show', $pbm->id), "User " . auth()->user()->name . " menambahkan data PBM");
        if ($request->submitShow) {
            return back()->with('success', 'Data berhasil disimpan');
        }
        return redirect()->route('pbm.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pbm  $pbm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Pbm::findOrFail($id));
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
    public function edit($id)
    {
        $this->authorize('view', Pbm::findOrFail($id));
        $pbm = Pbm::findOrFail($id);
        return view('backend.pbm.edit', [
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
    public function update(Request $request, $id)
    {
        $this->authorize('view', Pbm::findOrFail($id));
        $pbm = Pbm::findOrFail($id);
        $pbm->update([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'id_jenis_kapal' => $request->id_jenis_kapal,
            'agen' => $request->agen,
            'ukuran_isi_kotor' => $request->ukuran_isi_kotor,
            'ukuran_dwt' => $request->ukuran_dwt,
            'ukuran_loa' => $request->ukuran_loa,
            'tgl_muat' => $request->tgl_muat,
            'muat_sistem' => $request->muat_sistem,
            'muat_komoditi' => $request->muat_komoditi,
            'muat_jenis' => $request->muat_jenis,
            'muat_ton' => $request->muat_ton,
            'muat_unit' => $request->muat_unit,
            'muat_m3' => $request->muat_m3,
            'id_terminal_muat' => $request->id_terminal_muat,
            'tgl_bongkar' => $request->tgl_bongkar,
            'bongkar_sistem' => $request->bongkar_sistem,
            'bongkar_komoditi' => $request->bongkar_komoditi,
            'bongkar_jenis' => $request->bongkar_jenis,
            'bongkar_ton' => $request->bongkar_ton,
            'bongkar_unit' => $request->bongkar_unit,
            'bongkar_m3' => $request->bongkar_m3,
            'id_terminal_bongkar' => $request->id_terminal_bongkar,
        ]);
        storeLog(route('pbm.show', $pbm->id), "User " . auth()->user()->name . " mengubah data PBM");
        return redirect()->route('pbm.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pbm  $pbm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->delete == 'true') {
            $this->authorize('view', Pbm::findOrFail($id));
            $pbm = Pbm::destroy($id);
            storeLog('', "User " . auth()->user()->name . " menghapus data PBM");
            return redirect()->route('pbm.index')->with('success', 'Data berhasil dihapus');
        }
        alert()->error('Gagal', 'Data gagal dihapus');
        return redirect()->route('pbm.index');
    }

    public function cetakLaporan(Request $request)
    {
        $data = array();
        if (auth()->user()->role == 'admin') {
            $data = Pbm::whereBetween('tgl_bongkar', [$request->tgl_awal, $request->tgl_akhir])
                ->orWhereBetween('tgl_muat', [$request->tgl_awal, $request->tgl_akhir])
                ->get();
        } else {
            $rawData = Pbm::where('id_user', auth()->user()->id)
                ->whereBetween('tgl_bongkar', [$request->tgl_awal, $request->tgl_akhir])
                ->orWhereBetween('tgl_muat', [$request->tgl_awal, $request->tgl_akhir])
                ->get();

            foreach ($rawData as $d) {
                if ($d->id_user == auth()->user()->id) {
                    $data[] = $d;
                }
            }
        }
        $pdf = PDF::loadView('backend.pbm.laporan', [
            'data' => $data
        ]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('Pbm-' . time() . ".pdf");
    }
}
