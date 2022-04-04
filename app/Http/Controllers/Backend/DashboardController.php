<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JenisKapal;
use App\Models\Pelabuhan;
use App\Models\Terminal;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $jenis_kapal = JenisKapal::count();
        $pelabuhan = Pelabuhan::count();
        $terminal = Terminal::count();
        return view('backend.dashboard.index', compact('users', 'jenis_kapal', 'pelabuhan', 'terminal'));
    }
}
