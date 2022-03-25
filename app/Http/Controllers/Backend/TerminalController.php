<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Terminal;
use Illuminate\Http\Request;

class TerminalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.terminal.index', [
            'terminal' => Terminal::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.terminal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Terminal::create($request->only('nama', 'keterangan', 'kode'));
        return redirect()->route('terminal.index')->with('sukses', 'Data terminal berhasil disimpan');
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
     * @param  \App\Models\Terminal  $terminal
     * @return \Illuminate\Http\Response
     */
    public function edit(Terminal $terminal)
    {
        return view('backend.terminal.edit', [
            'terminal' => $terminal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Terminal $terminal)
    {
        $terminal->update($request->only('nama', 'keterangan', 'kode'));
        return redirect()->route('terminal.index')->with('sukses', 'Data terminal berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terminal $terminal)
    {
        $terminal->delete();
        return redirect()->route('terminal.index')->with('hapus', 'Data terminal berhasil dihapus');
    }
}
