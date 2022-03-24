<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Userdata;
use Illuminate\Http\Request;

class UserdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.user.index', [
            'user' => Userdata::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Userdata::create($request->only('nama', 'email', 'password'));
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function show(Userdata $userdata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function edit(Userdata $user)
    {
        return view('backend.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userdata $user)
    {
        $user->update($request->only('nama', 'email'));
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userdata $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
