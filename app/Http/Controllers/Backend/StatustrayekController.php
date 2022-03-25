<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StatusTrayek;
use Illuminate\Http\Request;

class StatustrayekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.status_trayek.index', [
            'status_trayek' => StatusTrayek::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.status_trayek.create')->with('sukses', 'Data status trayek berhasil disimpan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        StatusTrayek::create($request->only('nama', 'keterangan'));
        return redirect()->route('status_trayek.index')->with('sukses', 'Data status trayek bershasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusTrayek $status_trayek)
    {
        return view('backend.status_trayek.edit', [
            'status_trayek' => $status_trayek
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusTrayek $status_trayek)
    {
        $status_trayek->update($request->only('nama', 'keterangan'));
        return redirect()->route('status_trayek.index')->with('sukses', 'Data status trayek berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusTrayek $status_trayek)
    {
        $status_trayek->delete();
        return redirect()->route('status_trayek.index')->with('hapus', 'Data status trayek berhasil dihapus');
    }
}
