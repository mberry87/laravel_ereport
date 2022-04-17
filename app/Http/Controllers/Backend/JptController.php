<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Jpt;
use App\Models\Bendera;
use App\Models\JenisKapal;
use App\Models\Terminal;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class JptController extends Controller
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
                return view('backend.jpt.index', [
                    'jpt' => Jpt::with('bendera')
                        ->whereBetween('tgl_selesai_muat', [$request->tanggal_awal, $request->tanggal_akhir])
                        ->orWhereBetween('tgl_selesai_bongkar', [$request->tanggal_awal, $request->tanggal_akhir])
                        ->latest()
                        ->get()
                ]);
            }
            return view('backend.jpt.index', [
                'jpt' => Jpt::with('bendera')
                    ->where('id_user', auth()->user()->id)
                    ->whereBetween('tgl_selesai_muat', [$request->tanggal_awal, $request->tanggal_akhir])
                    ->orWhereBetween('tgl_selesai_bongkar', [$request->tanggal_awal, $request->tanggal_akhir])
                    ->latest()
                    ->get()
            ]);
        }
        if (auth()->user()->role == 'admin') {
            return view('backend.jpt.index', [
                'jpt' => Jpt::with('bendera')->latest()->get()
            ]);
        }
        return view('backend.jpt.index', [
            'jpt' => Jpt::with('bendera')->where('id_user', auth()->user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.jpt.create', [
            'jpt' => new Jpt(),
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
        Jpt::create([
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
            'tgl_mulai_muat' => $request->tgl_mulai_muat,
            'tgl_selesai_muat' => $request->tgl_selesai_muat,
            'tgl_mulai_bongkar' => $request->tgl_mulai_bongkar,
            'tgl_selesai_bongkar' => $request->tgl_selesai_bongkar,
            'perusahaan_muat_pengirim' => $request->perusahaan_muat_pengirim,
            'perusahaan_muat_penerima' => $request->perusahaan_muat_penerima,
            'perusahaan_bongkar_pengirim' => $request->perusahaan_bongkar_pengirim,
            'perusahaan_bongkar_penerima' => $request->perusahaan_bongkar_penerima,
            'id_user' => auth()->user()->id,
        ]);
        return redirect()->route('jpt.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $this->authorize('view', Jpt::findOrFail($id));
        $jpt = Jpt::findOrFail($id);
        return view('backend.jpt.edit', [
            'jpt' => $jpt,
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'jenis_kapal' => JenisKapal::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jpt  $jpt
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Jpt::findOrFail($id));
        $jpt = Jpt::findOrFail($id);
        return view('backend.jpt.show', [
            'jpt' => $jpt
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('view', Jpt::findOrFail($id));
        $jpt = Jpt::findOrFail($id);
        $jpt->update([
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
            'tgl_mulai_muat' => $request->tgl_mulai_muat,
            'tgl_selesai_muat' => $request->tgl_selesai_muat,
            'tgl_mulai_bongkar' => $request->tgl_mulai_bongkar,
            'tgl_selesai_bongkar' => $request->tgl_selesai_bongkar,
            'perusahaan_muat_pengirim' => $request->perusahaan_muat_pengirim,
            'perusahaan_muat_penerima' => $request->perusahaan_muat_penerima,
            'perusahaan_bongkar_pengirim' => $request->perusahaan_bongkar_pengirim,
            'perusahaan_bongkar_penerima' => $request->perusahaan_bongkar_penerima,
        ]);
        return redirect()->route('jpt.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\keagenan_kapal  $keagenan_kapal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->delete == 'true') {
            $this->authorize('view', Jpt::findOrFail($id));
            Jpt::destroy($id);
            return redirect()->route('jpt.index')->with('success', 'Data berhasil dihapus');
        }
        alert()->error('Gagal', 'Data gagal dihapus');
        return redirect()->route('keagenan_kapal.index');
    }

    public function cetakLaporan(Request $request)
    {
        $data = array();
        if (auth()->user()->role == 'admin') {
            $data = Jpt::whereBetween('created_at', [$request->tgl_awal, $request->tgl_akhir])
                ->orWhereBetween('created_at', [$request->tgl_awal, $request->tgl_akhir])
                ->get();
        } else {
            $rawData = Jpt::where('id_user', auth()->user()->id)
                ->whereBetween('created_at', [$request->tgl_awal, $request->tgl_akhir])
                ->orWhereBetween('created_at', [$request->tgl_awal, $request->tgl_akhir])
                ->get();

            foreach ($rawData as $d) {
                if ($d->id_user == auth()->user()->id) {
                    $data[] = $d;
                }
            }
        }
        $pdf = PDF::loadView('backend.jpt.laporan', [
            'data' => $data
        ]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('Jpt-' . time() . ".pdf");
    }
}
