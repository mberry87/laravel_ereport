<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.profile.index');
    }

    public function updateGeneralData(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'nama_perusahaan' => $request->nama_perusahaan,
        ]);

        return redirect()->back()->with('success', 'Profile berhasil diperbarui');
    }

    public function updatePassword(Request $request, $id)
    {
        if ($request->password1 != $request->password2) {
            return redirect()->back()->with('error', 'Password gagal diperbarui. Password tidak sama!');
        } else {
            $user = User::findOrFail($id);
            $user->update([
                'password' => Hash::make($request->password1),
            ]);
            return redirect()->back()->with('success', 'Password berhasil diperbarui');
        }
    }

    public function updateImage(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $path = storage_path('app/public/profile_images');
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        $avatar = Storage::disk('public')->put('profile_images', $request->avatar);
        $user->update([
            'avatar' => $avatar
        ]);
        return redirect()->back()->with('success', 'Foto profile berhasil diperbarui');
    }
}
