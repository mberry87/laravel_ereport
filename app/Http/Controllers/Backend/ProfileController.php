<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend');
    }

    public function updateGeneralData(Request $request)
    {
        # code...
    }

    public function updatePassword(Type $var = null)
    {
        # code...
    }
}
