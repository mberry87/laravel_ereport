<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JenisKapal;
use Illuminate\Http\Request;

class JeniskapalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.jenis_kapal.index', [
            'jenis_kapal' => JenisKapal::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.jenis_kapal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        JenisKapal::create($request->only('nama', 'keterangan', 'kode'));
        return redirect()->route('jenis_kapal.index')->with('sukses', 'Data jenis kapal berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisKapal  $jenisKapal
     * @return \Illuminate\Http\Response
     */
    public function show(JenisKapal $jenisKapal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisKapal  $jenisKapal
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisKapal $jenis_kapal)
    {
        return view('backend.jenis_kapal.edit', [
            'jenis_kapal' => $jenis_kapal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisKapal  $jenisKapal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisKapal $jenis_kapal)
    {
        $jenis_kapal->update($request->only('nama', 'keterangan', 'kode'));
        return redirect()->route('jenis_kapal.index')->with('sukses', 'Data jensi kapal berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisKapal  $jenisKapal
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisKapal $jenis_kapal)
    {
        $jenis_kapal->delete();
        return redirect()->route('jenis_kapal.index')->with('hapus', 'Data jenis kapal berhasil dihapus');
    }
}
