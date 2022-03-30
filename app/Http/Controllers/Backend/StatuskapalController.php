<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StatusKapal;
use Illuminate\Http\Request;

class StatuskapalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.status_kapal.index', [
            'status_kapal' => StatusKapal::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.status_kapal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        StatusKapal::create($request->only('nama', 'keterangan', 'kode'));
        return redirect()->route('status_kapal.index')->with('sukses', 'Data Status Kapal berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusKapal  $statusKapal
     * @return \Illuminate\Http\Response
     */
    public function show(StatusKapal $statusKapal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusKapal  $statusKapal
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusKapal $status_kapal)
    {
        return view('backend.status_kapal.edit', [
            'status_kapal' => $status_kapal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusKapal  $statusKapal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusKapal $status_kapal)
    {
        $status_kapal->update($request->only('nama', 'keterangan', 'kode'));
        return redirect()->route('status_kapal.index')->with('sukses', 'Data Status Kapal berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusKapal  $statusKapal
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusKapal $status_kapal)
    {
        $status_kapal->delete();
        return redirect()->route('status_kapal.index')->with('hapus', 'Data Status Kapal berhasil dihapus');
    }
}
