<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bendera;
use App\Models\Bup;
use App\Models\JenisKapal;
use App\Models\Jpt;
use App\Models\KeagenanKapal;
use App\Models\Notification;
use App\Models\Pbm;
use App\Models\Pelabuhan;
use App\Models\Pelnas;
use App\Models\Pelra;
use App\Models\StatusKapal;
use App\Models\StatusTrayek;
use App\Models\Terminal;
use App\Models\Tersus;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {

            $users = User::count();
            $jenis_kapal = JenisKapal::count();
            $pelabuhan = Pelabuhan::count();
            $terminal = Terminal::count();
            $statusTrayek = StatusTrayek::count();
            $statusKapal = StatusKapal::count();
            $bendera = Bendera::count();

            $tersus = Tersus::count();
            $bup = Bup::count();
            $pelnas = Pelnas::count();
            $keagenanKapal = KeagenanKapal::count();
            $pbm = Pbm::count();
            $jpt = Jpt::count();
            $pelra = Pelra::count();

            $pemberitahuan = Notification::latest()->limit(5)->get();

            return view('backend.dashboard.index', compact(
                'users',
                'jenis_kapal',
                'pelabuhan',
                'terminal',
                'tersus',
                'bup',
                'pbm',
                'jpt',
                'pelra',
                'pelnas',
                'keagenanKapal',
                'statusTrayek',
                'statusKapal',
                'bendera',
                'pemberitahuan'
            ));
        } else {
            $validPermissions = [];
            $userPermissions = User::findOrFail(auth()->user()->id);
            foreach($userPermissions->permissions as $permission) {
                array_push($validPermissions, $permission->name);
            }
            $tersus = Tersus::where('id_user', auth()->user()->id)->count();
            $bup = Bup::where('id_user', auth()->user()->id)->count();
            $pelnas = Pelnas::where('id_user', auth()->user()->id)->count();
            $keagenanKapal = KeagenanKapal::where('id_user', auth()->user()->id)->count();
            $pbm = Pbm::where('id_user', auth()->user()->id)->count();
            $jpt = Jpt::where('id_user', auth()->user()->id)->count();
            $pelra = Pelra::where('id_user', auth()->user()->id)->count();

            return view('backend.dashboard.index', compact(
                'tersus',
                'bup',
                'pbm',
                'jpt',
                'pelra',
                'pelnas',
                'keagenanKapal',
                'validPermissions'
            ));
        }
    }
}
