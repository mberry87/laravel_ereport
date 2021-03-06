<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bendera;
use App\Models\Pelabuhan;
use App\Models\Terminal;
use App\Models\Bup;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Gate;

class BupController extends Controller
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
                return view('backend.bup.index', [
                    'bup' => Bup::with('bendera')
                        ->whereBetween('tgl_datang', [$request->tanggal_awal, $request->tanggal_akhir])
                        ->orWhereBetween('tgl_berangkat', [$request->tanggal_awal, $request->tanggal_akhir])
                        ->latest()
                        ->get()
                ]);
            }
            return view('backend.bup.index', [
                'bup' => Bup::with('bendera')
                    ->where('id_user', auth()->user()->id)
                    ->whereBetween('tgl_datang', [$request->tanggal_awal, $request->tanggal_akhir])
                    ->orWhereBetween('tgl_berangkat', [$request->tanggal_awal, $request->tanggal_akhir])
                    ->latest()
                    ->get()
            ]);
        }
        if (auth()->user()->role == 'admin') {
            return view('backend.bup.index', [
                'bup' => Bup::with('bendera')->latest()->get()
            ]);
        }
        return view('backend.bup.index', [
            'bup' => Bup::with('bendera')->where('id_user', auth()->user()->id)->latest()->get()
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
        return view('backend.bup.create', [
            'bup' => new Bup(),
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
        $this->checkPermission();
        $bup = Bup::create([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_datang' => $request->tgl_datang,
            'id_terminal_datang' => $request->id_terminal_datang,
            'id_pelabuhan_datang' => $request->id_pelabuhan_datang,
            'kegiatan_datang' => $request->kegiatan_datang,
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_terminal_berangkat' => $request->id_terminal_berangkat,
            'id_pelabuhan_berangkat' => $request->id_pelabuhan_berangkat,
            'kegiatan_berangkat' => $request->kegiatan_berangkat,
            'id_user' => auth()->user()->id,
        ]);
        storeLog(route('bup.show', $bup->id), "User " . auth()->user()->name . " menambah data BUP");
        if ($request->submitShow) {
            return back()->with('success', 'Data berhasil disimpan');
        }
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
        $this->checkPermission();
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
    public function edit($id)
    {
        $this->checkPermission();
        $this->authorize('view', Bup::findOrFail($id));
        $bup = Bup::findOrFail($id);
        return view('backend.bup.edit', [
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
    public function update(Request $request, $id)
    {
        $this->checkPermission();
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
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_terminal_berangkat' => $request->id_terminal_berangkat,
            'id_pelabuhan_berangkat' => $request->id_pelabuhan_berangkat,
            'kegiatan_berangkat' => $request->kegiatan_berangkat,
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
        $this->checkPermission();
        if ($request->delete == 'true') {
            $this->authorize('view', Bup::findOrFail($id));
            Bup::destroy($id);
            storeLog(null, "User " . auth()->user()->name . " menghapus data BUP");
            return redirect()->route('bup.index')->with('success', 'Data berhasil dihapus');
        }
        alert()->error('Gagal', 'Data gagal dihapus');
        return redirect()->route('bup.index');
    }

    public function cetakLaporan(Request $request)
    {
        $this->checkPermission();
        $data = null;
        if (auth()->user()->role == 'admin') {
            $data = Bup::whereBetween('tgl_datang', [$request->tgl_awal, $request->tgl_akhir])
                ->orWhereBetween('tgl_berangkat', [$request->tgl_awal, $request->tgl_akhir])
                ->get();
        } else {
            $rawData = Bup::where('id_user', auth()->user()->id)
                ->whereBetween('tgl_datang', [$request->tgl_awal, $request->tgl_akhir])
                ->orWhereBetween('tgl_berangkat', [$request->tgl_awal, $request->tgl_akhir])
                ->get();
            foreach ($rawData as $d) {
                if ($d->id_user == auth()->user()->id) {
                    $data[] = $d;
                }
            }
        }
        $pdf = PDF::loadView('backend.bup.laporan', [
            'data' => $data
        ]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('Bup-' . time() . ".pdf");
    }

    private function checkPermission()
    {
        $validPermissions = [];
        $userPermissions = \App\Models\User::findOrFail(auth()->user()->id);
        foreach($userPermissions->permissions as $permission) {
            array_push($validPermissions, $permission->name);
        }
        if(!in_array('form_bup', $validPermissions)) {
            if (auth()->user()->role == 'admin') {
                return true;
            }
            return abort(404);
        }
        return true;
    }
}
