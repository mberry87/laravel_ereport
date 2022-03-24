<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tersusdatang;
use Illuminate\Http\Request;

class TersusdatangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.tersus_datang.index', [
            'tersus_datang' => Tersusdatang::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.tersus.create');
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
     * @param  \App\Models\Tersusdatang  $tersusdatang
     * @return \Illuminate\Http\Response
     */
    public function show(Tersusdatang $tersusdatang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tersusdatang  $tersusdatang
     * @return \Illuminate\Http\Response
     */
    public function edit(Tersusdatang $tersusdatang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tersusdatang  $tersusdatang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tersusdatang $tersusdatang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tersusdatang  $tersusdatang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tersusdatang $tersusdatang)
    {
        //
    }
}
