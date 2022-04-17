<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bendera;
use App\Models\StatusKapal;
use App\Models\JenisKapal;
use App\Models\Pelabuhan;
use App\Models\Terminal;
use App\Models\Pelnas;
use App\Models\StatusTrayek;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PelnasController extends Controller
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
                return view('backend.pelnas.index', [
                    'pelnas' => Pelnas::with('bendera')
                        ->whereBetween('tgl_datang', [$request->tanggal_awal, $request->tanggal_akhir])
                        ->orWhereBetween('tgl_berangkat', [$request->tanggal_awal, $request->tanggal_akhir])
                        ->latest()
                        ->get()
                ]);
            }
            return view('backend.pelnas.index', [
                'pelnas' => Pelnas::with('bendera')
                    ->where('id_user', auth()->user()->id)
                    ->whereBetween('tgl_datang', [$request->tanggal_awal, $request->tanggal_akhir])
                    ->orWhereBetween('tgl_berangkat', [$request->tanggal_awal, $request->tanggal_akhir])
                    ->latest()
                    ->get()
            ]);
        }

        if (auth()->user()->role == 'admin') {
            return view('backend.pelnas.index', [
                'pelnas' => Pelnas::with('bendera')
                    ->latest()->get()
            ]);
        }
        return view('backend.pelnas.index', [
            'pelnas' => Pelnas::with('bendera')->where('id_user', auth()->user()->id)
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
        return view('backend.pelnas.create', [
            'pelnas' => new Pelnas(),
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'pelabuhan' => Pelabuhan::all(),
            'status_trayek' => StatusTrayek::all(),
            'status_kapal' => StatusKapal::all(),
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
        Pelnas::create([
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
            'id_status_trayek_datang' => $request->id_status_trayek_datang,
            'id_jenis_kapal_datang' => $request->id_jenis_kapal_datang,
            'id_status_kapal_datang' => $request->id_status_kapal_datang,
            'id_status_trayek_berangkat' => $request->id_status_trayek_datang,
            'id_jenis_kapal_berangkat' => $request->id_jenis_kapal_datang,
            'id_status_kapal_berangkat' => $request->id_status_kapal_datang,
            'id_user' => $request->id_user,
        ]);
        return redirect()->route('pelnas.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelnas  $pelnas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Pelnas::findOrFail($id));
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
    public function edit($id)
    {
        $this->authorize('view', Pelnas::findOrFail($id));
        $pelnas = Pelnas::findOrFail($id);
        return view('backend.pelnas.edit', [
            'pelnas' => $pelnas,
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'pelabuhan' => Pelabuhan::all(),
            'status_trayek' => StatusTrayek::all(),
            'status_kapal' => StatusKapal::all(),
            'jenis_kapal' => JenisKapal::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelnas  $pelnas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('view', Pelnas::findOrFail($id));
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
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_terminal_berangkat' => $request->id_terminal_berangkat,
            'id_pelabuhan_berangkat' => $request->id_pelabuhan_berangkat,
            'jumlah_muatan_berangkat' => $request->jumlah_muatan_berangkat,
            'jenis_muatan_berangkat' => $request->jenis_muatan_berangkat,
            'id_status_trayek_datang' => $request->id_status_trayek_datang,
            'id_jenis_kapal_datang' => $request->id_jenis_kapal_datang,
            'id_status_kapal_datang' => $request->id_status_kapal_datang,
            'id_status_trayek_berangkat' => $request->id_status_trayek_datang,
            'id_jenis_kapal_berangkat' => $request->id_jenis_kapal_datang,
            'id_status_kapal_berangkat' => $request->id_status_kapal_datang,
        ]);
        return redirect()->route('pelnas.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelnas  $pelnas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->delete == 'true') {
            $this->authorize('view', Pelnas::findOrFail($id));
            Pelnas::destroy($id);
            return redirect()->route('pelnas.index')->with('success', 'Data berhasil dihapus');
        }
        alert()->error('Gagal', 'Data gagal dihapus');
        return redirect()->route('pelnas.index');
    }

    public function cetakLaporan(Request $request)
    {
        $data = null;
        if (auth()->user()->role == 'admin') {
            $rawData = Pelnas::whereBetween('tgl_datang', [$request->tgl_awal, $request->tgl_akhir])
                ->orWhereBetween('tgl_berangkat', [$request->tgl_awal, $request->tgl_akhir])
                ->get();
            foreach ($rawData as $d) {
                if ($d->id_user == auth()->user()->id) {
                    $data[] = $d;
                }
            }
        } else {
            $rawData = Pelnas::where('id_user', auth()->user()->id)
                ->whereBetween('tgl_datang', [$request->tgl_awal, $request->tgl_akhir])
                ->orWhereBetween('tgl_berangkat', [$request->tgl_awal, $request->tgl_akhir])
                ->get();

            foreach ($rawData as $d) {
                if ($d->id_user == auth()->user()->id) {
                    $data[] = $d;
                }
            }
        }
        $pdf = PDF::loadView('backend.pelnas.laporan', [
            'data' => $data
        ]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('Pelnas-' . time() . ".pdf");
    }
}
