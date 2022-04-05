<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bendera;
use Illuminate\Http\Request;

class BenderaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        isAdmin();
        return view('backend.bendera.index', [
            'bendera' => Bendera::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        isAdmin();
        return view('backend.bendera.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bendera::create($request->only('nama', 'keterangan'));
        return redirect()->route('bendera.index')->with('sukses', 'Data bendera berhasil disimpan');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bendera  $bendera
     * @return \Illuminate\Http\Response
     */
    public function edit(Bendera $bendera)
    {
        return view('backend.bendera.edit', [
            'bendera' => $bendera
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bendera  $bendera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bendera $bendera)
    {
        $bendera->update($request->only('nama', 'keterangan'));
        return redirect()->route('bendera.index')->with('sukses', 'Data bendera berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bendera  $bendera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bendera $bendera)
    {
        $bendera->delete();
        return redirect()->route('bendera.index')->with('hapus', 'Data bendera berhasil dihapus');
    }
}
