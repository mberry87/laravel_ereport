<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
        return view('backend.tersus.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tersus  $tersus
     * @return \Illuminate\Http\Response
     */
    public function show(Tersus $tersus)
    {
        //
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
}
