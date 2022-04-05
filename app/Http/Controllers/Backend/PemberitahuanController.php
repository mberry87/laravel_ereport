<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemberitahuanController extends Controller
{
    public function index()
    {
        return view('backend.pemberitahuan.index', [
            'notifications' => Notification::latest()->get()
        ]);
    }


    public function read($id)
    {
        $notif = Notification::findOrFail($id)->update([
            'is_read' => 1
        ]);
        return back()->with('sukses', 'Berhasil menandai sudah dibaca');
    }


    public function readAll()
    {
        $notif = Notification::where('is_read', '0')->get();
        foreach ($notif as $data) {
            Notification::findOrFail($data->id)->update([
                'is_read' => 1
            ]);
        }
        return back()->with('sukses', 'Berhasil menandai sudah dibaca');
    }

    public function deleteAll()
    {
        DB::table('notifications')->truncate();
        return back()->with('sukses', 'Data pemberitahuan berhasil direset');
    }
}
