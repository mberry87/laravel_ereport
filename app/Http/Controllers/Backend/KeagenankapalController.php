<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bendera;
use App\Models\KeagenanKapal;
use App\Models\StatusKapal;
use App\Models\JenisKapal;
use App\Models\Terminal;
use App\Models\StatusTrayek;

class KeagenankapalController extends Controller
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
                return view('backend.keagenan_kapal.index', [
                    'keagenan_kapal' => KeagenanKapal::with('bendera')
                        ->whereBetween('tgl_datang', [$request->tanggal_awal, $request->tanggal_akhir])
                        ->orWhereBetween('tgl_berangkat', [$request->tanggal_awal, $request->tanggal_akhir])
                        ->get()
                ]);
            }
            return view('backend.keagenan_kapal.index', [
                'keagenan_kapal' => KeagenanKapal::with('bendera')
                    ->where('id_user', auth()->user()->id)
                    ->whereBetween('tgl_datang', [$request->tanggal_awal, $request->tanggal_akhir])
                    ->orWhereBetween('tgl_berangkat', [$request->tanggal_awal, $request->tanggal_akhir])
                    ->get()
            ]);
        }
        if (auth()->user()->role == 'admin') {
            return view('backend.keagenan_kapal.index', [
                'keagenan_kapal' => KeagenanKapal::with('bendera')->get()
            ]);
        }
        return view('backend.keagenan_kapal.index', [
            'keagenan_kapal' => KeagenanKapal::with('bendera')->where('id_user', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDatang()
    {
        return view('backend.keagenan_kapal.create-datang', [
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
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
    public function storeDatang(Request $request)
    {
        dd($request->all());
        KeagenanKapal::create($request->all() + ['input_oleh' => auth()->user()->name, 'id_user' => auth()->user()->id]);
        return redirect()->route('keagenan_kapal.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KeagenanKapal  $keagenan_kapal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', KeagenanKapal::findOrFail($id));
        $keagenan_kapal = KeagenanKapal::findOrFail($id);
        return view('backend.keagenan_kapal.show', [
            'keagenan_kapal' => $keagenan_kapal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KeagenanKapal  $keagenan_kapal
     * @return \Illuminate\Http\Response
     */
    public function editDatang($id)
    {
        $this->authorize('view', KeagenanKapal::findOrFail($id));
        $keagenan_kapal = KeagenanKapal::findOrFail($id);
        return view('backend.keagenan_kapal.edit-datang', [
            'keagenan_kapal' => $keagenan_kapal,
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'status_trayek' => StatusTrayek::all(),
            'status_kapal' => StatusKapal::all(),
            'jenis_kapal' => JenisKapal::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KeagenanKapal  $keagenan_kapal
     * @return \Illuminate\Http\Response
     */
    public function updateDatang(Request $request, $id)
    {
        $this->authorize('view', KeagenanKapal::findOrFail($id));
        $keagenan_kapal = KeagenanKapal::findOrFail($id);
        $keagenan_kapal->update([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_datang' => $request->tgl_datang,
            'id_terminal_datang' => $request->id_terminal_datang,
            'jumlah_bongkar_datang' => $request->jumlah_bongkar_datang,
            'jenis_muatan_datang' => $request->jenis_muatan_datang,
            'id_status_trayek' => $request->id_status_trayek,
            'id_status_kapal' => $request->id_status_kapal,
            'id_jenis_kapal' => $request->id_jenis_kapal,
            'update_oleh' =>  auth()->user()->name,
            'id_user' => auth()->user()->id,
        ]);
        return redirect()->route('keagenan_kapal.index')->with('success', 'Data berhasil diubah');
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
            $this->authorize('view', KeagenanKapal::findOrFail($id));
            KeagenanKapal::destroy($id);
            return redirect()->route('keagenan_kapal.index')->with('success', 'Data berhasil dihapus');
        }
        alert()->error('Gagal', 'Data gagal dihapus');
        return redirect()->route('keagenan_kapal.index');
    }

    public function createBerangkat()
    {
        return view('backend.keagenan_kapal.create-berangkat', [
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'status_trayek' => StatusTrayek::all(),
            'status_kapal' => StatusKapal::all(),
            'jenis_kapal' => JenisKapal::all()
        ]);
    }

    public function storeBerangkat(Request $request)
    {

        KeagenanKapal::create([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_terminal_berangkat' => $request->id_terminal_berangkat,
            'jumlah_muatan_berangkat' => $request->jumlah_muatan_berangkat,
            'jenis_muatan_berangkat' => $request->jenis_muatan_berangkat,
            'id_status_trayek' => $request->id_status_trayek,
            'id_status_kapal' => $request->id_status_kapal,
            'id_jenis_kapal' => $request->id_jenis_kapal,
            'input_oleh' =>  auth()->user()->name,
        ]);
        return redirect()->route('keagenan_kapal.index')->with('success', 'Data berhasil disimpan');
    }

    public function editBerangkat($id)
    {
        $this->authorize('view', KeagenanKapal::findOrFail($id));
        $keagenan_kapal = KeagenanKapal::findOrFail($id);
        return view('backend.keagenan_kapal.edit-berangkat', [
            'keagenan_kapal' => $keagenan_kapal,
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'status_trayek' => StatusTrayek::all(),
            'status_kapal' => StatusKapal::all(),
            'jenis_kapal' => JenisKapal::all()

        ]);
        return redirect()->route('keagenan.index')->with('success', 'Data berhasil diubah');
    }

    public function updateBerangkat(Request $request, $id)
    {
        $this->authorize('view', KeagenanKapal::findOrFail($id));
        $Keagenan_kapal = KeagenanKapal::findOrFail($id);
        $Keagenan_kapal->update([
            'nama_kapal' => $request->nama_kapal,
            'id_bendera' => $request->id_bendera,
            'isi_kotor' => $request->isi_kotor,
            'tgl_berangkat' => $request->tgl_berangkat,
            'id_terminal_berangkat' => $request->id_terminal_berangkat,
            'jumlah_muatan_berangkat' => $request->jumlah_muatan_berangkat,
            'jenis_muatan_berangkat' => $request->jenis_muatan_berangkat,
            'id_status_trayek' => $request->id_status_trayek,
            'id_status_kapal' => $request->id_status_kapal,
            'id_jenis_kapal' => $request->id_jenis_kapal,
            'update_oleh' =>  auth()->user()->name,
        ]);
        return redirect()->route('keagenan_kapal.index')->with('success', 'Data berhasil diubah');
    }
}
