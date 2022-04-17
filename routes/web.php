<?php

use App\Http\Controllers\Backend\BenderaController;
use App\Http\Controllers\Backend\BupController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\JeniskapalController;
use App\Http\Controllers\Backend\JptController;
use App\Http\Controllers\Backend\KeagenankapalController;
use App\Http\Controllers\Backend\PbmController;
use App\Http\Controllers\Backend\PelabuhanController;
use App\Http\Controllers\Backend\PemberitahuanController;
use App\Http\Controllers\Backend\TerminalController;
use App\Http\Controllers\Backend\PelnasController;
use App\Http\Controllers\Backend\PelraController;
use App\Http\Controllers\Backend\PengaturanController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\StatuskapalController;
use App\Http\Controllers\Backend\StatustrayekController;
use App\Http\Controllers\Backend\TersusController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['middleware' => ['isUserActive']], function () {
    Auth::routes([
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);
});


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('/bendera', BenderaController::class);
    Route::get('/bendera/delete/{id}', [BenderaController::class, 'destroy'])->name('bendera.destroy');

    Route::resource('/pelabuhan', PelabuhanController::class);
    Route::get('/pelabuhan/delete/{id}', [PelabuhanController::class, 'destroy'])->name('pelabuhan.destroy');

    Route::resource('/terminal', TerminalController::class);
    Route::get('/terminal/delete/{id}', [TerminalController::class, 'destroy'])->name('terminal.destroy');

    Route::resource('/jenis_kapal', JeniskapalController::class);
    Route::get('/jenis_kapal/delete/{id}', [JeniskapalController::class, 'destroy'])->name('jenis_kapal.destroy');

    Route::resource('/status_kapal', StatuskapalController::class);
    Route::get('/status_kapal/delete/{id}', [StatuskapalController::class, 'destroy'])->name('status_kapal.destroy');

    Route::resource('/status_trayek', StatustrayekController::class);
    Route::get('/status_trayek/delete/{id}', [StatustrayekController::class, 'destroy'])->name('status_trayek.destroy');

    // Tersus
    Route::get('/tersus/index', [TersusController::class, 'index'])->name('tersus.index');
    Route::get('/tersus/create', [TersusController::class, 'create'])->name('tersus.create');
    Route::post('/tersus/store', [TersusController::class, 'store'])->name('tersus.store');
    Route::get('/tersus/{id}/edit', [TersusController::class, 'edit'])->name('tersus.edit');
    Route::put('/tersus/{id}', [TersusController::class, 'update'])->name('tersus.update');
    Route::get('/tersus/{id}/show', [TersusController::class, 'show'])->name('tersus.show');
    Route::get('/tersus/delete/{id}', [TersusController::class, 'destroy'])->name('tersus.destroy');
    Route::post('/tersus/laporan', [TersusController::class, 'cetakLaporan'])->name('tersus.laporan');

    // bup
    Route::get('/bup/index', [BupController::class, 'index'])->name('bup.index');
    Route::get('/bup/create', [BupController::class, 'create'])->name('bup.create');
    Route::post('/bup/store', [BupController::class, 'store'])->name('bup.store');
    Route::get('/bup/{id}/edit', [BupController::class, 'edit'])->name('bup.edit');
    Route::put('/bup/update/{id}', [BupController::class, 'update'])->name('bup.update');
    Route::get('/bup/show/{id}', [BupController::class, 'show'])->name('bup.show');
    Route::get('/bup/delete/{id}', [BupController::class, 'destroy'])->name('bup.destroy');
    Route::post('/bup/laporan', [BupController::class, 'cetakLaporan'])->name('bup.laporan');


    // pelnas
    Route::get('/pelnas/index', [PelnasController::class, 'index'])->name('pelnas.index');
    Route::get('/pelnas/create', [PelnasController::class, 'create'])->name('pelnas.create');
    Route::post('/pelnas/store', [PelnasController::class, 'store'])->name('pelnas.store');
    Route::get('/pelnas/{id}/edit', [PelnasController::class, 'edit'])->name('pelnas.edit');
    Route::put('/pelnas/update/{id}', [PelnasController::class, 'update'])->name('pelnas.update');
    Route::get('/pelnas/{id}/show', [PelnasController::class, 'show'])->name('pelnas.show');
    Route::get('/pelnas/delete/{id}', [PelnasController::class, 'destroy'])->name('pelnas.destroy');
    Route::post('/pelnas/laporan', [PelnasController::class, 'cetakLaporan'])->name('pelnas.laporan');

    // keagenan kapal
    Route::get('/keagenan_kapal/index', [KeagenankapalController::class, 'index'])->name('keagenan_kapal.index');
    Route::get('/keagenan_kapal/create', [KeagenankapalController::class, 'create'])->name('keagenan_kapal.create');
    Route::post('/keagenan_kapal/store', [KeagenankapalController::class, 'store'])->name('keagenan_kapal.store');
    Route::get('/keagenan_kapal/{id}/edit', [KeagenankapalController::class, 'edit'])->name('keagenan_kapal.edit');
    Route::put('/keagenan_kapal/update/{id}', [KeagenankapalController::class, 'update'])->name('keagenan_kapal.update');
    Route::get('/keagenan_kapal/{id}/show', [KeagenankapalController::class, 'show'])->name('keagenan_kapal.show');
    Route::get('/keagenan_kapal/delete/{id}', [KeagenankapalController::class, 'destroy'])->name('keagenan_kapal.destroy');
    Route::post('/keagenan_kapal/laporan', [KeagenankapalController::class, 'cetakLaporan'])->name('keagenan_kapal.laporan');

    // PBM
    Route::get('/pbm/index', [PbmController::class, 'index'])->name('pbm.index');
    Route::get('/pbm/create', [PbmController::class, 'create'])->name('pbm.create');
    Route::post('/pbm/store', [PbmController::class, 'store'])->name('pbm.store');
    Route::get('/pbm/{id}/edit', [PbmController::class, 'edit'])->name('pbm.edit');
    Route::put('/pbm/update/{id}', [PbmController::class, 'update'])->name('pbm.update');
    Route::get('/pbm/{id}/show', [PbmController::class, 'show'])->name('pbm.show');
    Route::get('/pbm/delete/{id}', [PbmController::class, 'destroy'])->name('pbm.destroy');
    Route::post('/pbm/laporan', [PbmController::class, 'cetakLaporan'])->name('pbm.laporan');

    // JPT
    Route::get('/jpt/index', [JptController::class, 'index'])->name('jpt.index');
    Route::get('/jpt/create', [JptController::class, 'create'])->name('jpt.create');
    Route::post('/jpt/store', [JptController::class, 'store'])->name('jpt.store');
    Route::get('/jpt/{id}/edit', [JptController::class, 'edit'])->name('jpt.edit');
    Route::put('/jpt/update/{id}', [JptController::class, 'update'])->name('jpt.update');
    Route::get('/jpt/show/{id}', [JptController::class, 'show'])->name('jpt.show');
    Route::get('/jpt/delete/{id}', [JptController::class, 'destroy'])->name('jpt.destroy');
    Route::post('/jpt/laporan', [JptController::class, 'cetakLaporan'])->name('jpt.laporan');

    // PELRA
    Route::get('/pelra/index', [PelraController::class, 'index'])->name('pelra.index');
    Route::get('/pelra/create', [PelraController::class, 'create'])->name('pelra.create');
    Route::post('/pelra/store', [PelraController::class, 'store'])->name('pelra.store');
    Route::get('/pelra/{id}/edit', [PelraController::class, 'edit'])->name('pelra.edit');
    Route::put('/pelra/update/{id}', [PelraController::class, 'update'])->name('pelra.update');
    Route::get('/pelra/show/{id}', [PelraController::class, 'show'])->name('pelra.show');
    Route::get('/pelra/delete/{id}', [PelraController::class, 'destroy'])->name('pelra.destroy');
    Route::post('/pelra/laporan', [PelraController::class, 'cetakLaporan'])->name('pelra.laporan');

    // user
    Route::resource('/user', UserController::class);
    Route::get('/user/reset-password/{id}', [UserController::class, 'resetPassword'])->name('user.reset.password');
    Route::get('/user/update-status/{id}', [UserController::class, 'updateStatus'])->name('user.reset.status');
    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/updateGeneralData/{id}', [ProfileController::class, 'updateGeneralData'])->name('profile.update.data');
    Route::put('/profile/updatePassword/{id}', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::put('/profile/updateAVatar/{id}', [ProfileController::class, 'updateImage'])->name('profile.update.avatar');
    Route::get('/pengaturan/index', [PengaturanController::class, 'index'])->name('pengaturan.index');
    Route::post('/pengaturan/update_general_data', [PengaturanController::class, 'updateGeneralData'])->name('pengaturan.update.data');
    Route::post('/pengaturan/update_logo', [PengaturanController::class, 'updateLogo'])->name('pengaturan.update.logo');

    Route::get('/pemberitahuan', [PemberitahuanController::class, 'index'])->name('pemberitahuan.index');
    Route::get('/pemberitahuan/bacasemua', [PemberitahuanController::class, 'readAll'])->name('pemberitahuan.readall');
    Route::get('/pemberitahuan/baca/{id}', [PemberitahuanController::class, 'read'])->name('pemberitahuan.read');
    Route::get('/pemberitahuan/hapussemua', [PemberitahuanController::class, 'deleteAll'])->name('pemberitahuan.deleteall');
});
