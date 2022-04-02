<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    public function index()
    {
        return view('backend.pengaturan.index', [
            'pengaturan' => Pengaturan::first()
        ]);
    }

    public function updateGeneralData(Request $request)
    {
        $pengaturan = Pengaturan::first();
        $pengaturan->update([
            'nama_sistem' => $request->nama_sistem
        ]);
        return back()->with('success', 'Data berhasil diubah');
    }

    public function updateLogo(Request $request)
    {
        $pengaturan = Pengaturan::first();
        $path = storage_path('app/public/logo');
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        $logo = Storage::disk('public')->put('logo', $request->logo);
        $pengaturan->update([
            'logo' => $logo
        ]);
        return redirect()->back()->with('success', 'Logo berhasil diperbarui');
    }
}
