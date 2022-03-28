<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bendera;
use App\Models\Pelabuhan;
use App\Models\Terminal;
use App\Models\Tersus;
use Illuminate\Http\Request;

class TersusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.tersus.index', [
            'tersus' => Tersus::with('bendera')->get()
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
        Tersus::create($request->all() + ['input_oleh' => auth()->user()->name]);
        return redirect()->route('tersus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tersus  $tersus
     * @return \Illuminate\Http\Response
     */
    public function show(Tersus $tersus)
    {
        return view('backend.tersus.show', [
            'tersus' => Tersus::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tersus  $tersus
     * @return \Illuminate\Http\Response
     */
    public function edit(Tersus $tersus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tersus  $tersus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tersus $tersus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tersus  $tersus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tersus $tersus)
    {
        //
    }

    public function createTersusBerangkat()
    {
        return view('backend.tersus.create-berangkat', [
            'bendera' => Bendera::all(),
            'terminal' => Terminal::all(),
            'pelabuhan' => Pelabuhan::all()
        ]);
    }


    public function storeTersusBerangkat(Request $request)
    {
        $tersus = Tersus::where('nama_kapal', '=', $request->nama_kapal)
            ->whereNull('tgl_berangkat')
            ->first();
        if ($tersus) {
            $tersus->update([
                'tgl_berangkat' => $request->tgl_berangkat,
                'id_terminal_berangkat' => $request->id_terminal_berangkat,
                'id_pelabuhan_berangkat' => $request->id_pelabuhan_berangkat,
                'jumlah_bongkar_berangkat' => $request->jumlah_bongkar_berangkat,
                'jenis_muatan_berangkat' => $request->jenis_muatan_berangkat,
                'update_oleh' =>  auth()->user()->name,
            ]);
            return redirect()->route('tersus.index');
        } else {
            return redirect()->route('tersus.index');
        }
    }
}
