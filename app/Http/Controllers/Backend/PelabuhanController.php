<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pelabuhan;
use Illuminate\Http\Request;

class PelabuhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pelabuhan.index', [
            'pelabuhan' => Pelabuhan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pelabuhan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pelabuhan::create($request->only('nama', 'keterangan', 'kode'));
        return redirect()->route('pelabuhan.index')->with('success', 'Data pelabuhan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelabuhan  $pelabuhan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelabuhan $pelabuhan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelabuhan  $pelabuhan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelabuhan $pelabuhan)
    {
        return view('backend.pelabuhan.edit', [
            'pelabuhan' => $pelabuhan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelabuhan  $pelabuhan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelabuhan $pelabuhan)
    {
        $pelabuhan->update($request->only('nama', 'keterangan', 'kode'));
        return redirect()->route('pelabuhan.index')->with('sukses', 'Data pelabuhan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelabuhan  $pelabuhan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelabuhan::destroy($id);
        return redirect()->route('pelabuhan.index')->with('hapus', 'Data bendera berhasil dihapus');
    }
}
