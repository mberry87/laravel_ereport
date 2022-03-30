<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.profile.index');
    }

    public function updateGeneralData(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->update([]);
    }

    public function updatePassword(Request $request)
    {
        # code...
    }

    public function updateImage(Request $request)
    {
        # code...
    }
}
