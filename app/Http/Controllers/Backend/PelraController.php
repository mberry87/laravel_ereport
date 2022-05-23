<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pelra;
use App\Models\Bendera;
use App\Models\StatusKapal;
use App\Models\Pelabuhan;
use App\Models\StatusTrayek;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Gate;

class PelraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->checkPermission();
        if ($request->filter && $request->tanggal_awal && $request->tanggal_akhir) {
            if (auth()->user()->role == 'admin') {
                return view('backend.pelra.index', [
                    'pelra' => Pelra::with('bendera')
                        ->whereBetween('tgl_datang', [$request->tanggal_awal, $request->tanggal_akhir])
                        ->orWhereBetween('tgl_berangkat', [$request->tanggal_awal, $request->tanggal_akhir])
                        ->latest()
                        ->get()
                ]);
            }
            return view('backend.pelra.index', [
                'pelra' => Pelra::with('bendera')
                    ->where('id_user', auth()->user()->id)
                    ->whereBetween('tgl_datang', [$request->tanggal_awal, $request->tanggal_akhir])
                    ->orWhereBetween('tgl_berangkat', [$request->tanggal_awal, $request->tanggal_akhir])
                    ->latest()
                    ->get()
            ]);
        }
        if (auth()->user()->role == 'admin') {
            return view('backend.pelra.index', [
                'pelra' => Pelra::with('bendera')
                    ->latest()->get()
            ]);
        }
        return view('backend.pelra.index', [
            'pelra' => Pelra::with('bendera')->where('id_user', auth()->user()->id)
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
        $this->checkPermission();
        return view('backend.pelra.create', [
            'pelra' => new Pelra(),
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
    public function store(Request $request)
    {
        $this->checkPermission();
        $pelra = Pelra::create([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'id_status_trayek' => $request->id_status_trayek,
            'id_status_kapal' => $request->id_status_kapal,
            'tgl_datang' => $request->tgl_datang,
            'id_pelabuhan_datang' => $request->id_pelabuhan_datang,
            'jenis_muatan_datang' => $request->jenis_muatan_datang,
            'bongkar_tonm3' => $request->bongkar_tonm3,
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_pelabuhan_berangkat' => $request->id_pelabuhan_berangkat,
            'jenis_muatan_berangkat' => $request->jenis_muatan_berangkat,
            'muat_tonm3' => $request->muat_tonm3,
            'id_user' => auth()->user()->id,
        ]);
        storeLog(route('pelra.show', $pelra->id), "User " . auth()->user()->name . " menambahkan data Pelra");
        if ($request->submitShow) {
            return back()->with('success', 'Data berhasil disimpan');
        }
        return redirect()->route('pelra.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelra  $pelra
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->checkPermission();
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
    public function edit($id)
    {
        $this->checkPermission();
        $this->authorize('view', Pelra::findOrFail($id));
        $pelra = Pelra::findOrFail($id);
        return view('backend.pelra.edit', [
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
    public function update(Request $request, $id)
    {
        $this->checkPermission();
        $this->authorize('view', Pelra::findOrFail($id));
        $pelra = Pelra::findOrFail($id);
        $pelra->update([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'id_status_trayek' => $request->id_status_trayek,
            'id_status_kapal' => $request->id_status_kapal,
            'tgl_datang' => $request->tgl_datang,
            'id_pelabuhan_datang' => $request->id_pelabuhan_datang,
            'jenis_muatan_datang' => $request->jenis_muatan_datang,
            'bongkar_tonm3' => $request->bongkar_tonm3,
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_pelabuhan_berangkat' => $request->id_pelabuhan_berangkat,
            'jenis_muatan_berangkat' => $request->jenis_muatan_berangkat,
            'muat_tonm3' => $request->muat_tonm3,
        ]);
        storeLog(route('pelra.show', $pelra->id), "User " . auth()->user()->name . " mengubah data pelra");
        return redirect()->route('pelra.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelra  $pelra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->checkPermission();
        if ($request->delete == 'true') {
            $this->authorize('view', Pelra::findOrFail($id));
            Pelra::destroy($id);
            storeLog('', "User " . auth()->user()->name . " menghapus data pelra");
            return redirect()->route('pelra.index')->with('success', 'Data berhasil dihapus');
        }
        alert()->error('Gagal', 'Data gagal dihapus');
        return redirect()->route('pelra.index');
    }

    public function cetakLaporan(Request $request)
    {
        $this->checkPermission();
        $data = null;
        if (auth()->user()->role == 'admin') {
            $data = Pelra::whereBetween('created_at', [$request->tgl_awal, $request->tgl_akhir])
                ->orWhereBetween('created_at', [$request->tgl_awal, $request->tgl_akhir])
                ->get();
        } else {
            $rawData = Pelra::where('id_user', auth()->user()->id)
                ->whereBetween('created_at', [$request->tgl_awal, $request->tgl_akhir])
                ->orWhereBetween('created_at', [$request->tgl_awal, $request->tgl_akhir])
                ->get();

            foreach ($rawData as $d) {
                if ($d->id_user == auth()->user()->id) {
                    $data[] = $d;
                }
            }
        }
        $pdf = PDF::loadView('backend.pelra.laporan', [
            'data' => $data
        ]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('Pelra-' . time() . ".pdf");
    }

    private function checkPermission()
    {
        $validPermissions = [];
        $userPermissions = \App\Models\User::findOrFail(auth()->user()->id);
        foreach($userPermissions->permissions as $permission) {
            array_push($validPermissions, $permission->name);
        }
        if(!in_array('form_pelra', $validPermissions)) {
            if (auth()->user()->role == 'admin') {
                return true;
            }
            return abort(404);
        }
        return true;
    }
}
