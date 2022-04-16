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
    Route::get('/bup/create-bup-datang', [BupController::class, 'createDatang'])->name('bup.datang.create');
    Route::post('/bup/store-bup-datang', [BupController::class, 'storeDatang'])->name('bup.datang.store');
    Route::get('/bup/{id}/edit-bup-datang/', [BupController::class, 'editDatang'])->name('bup.datang.edit');
    Route::put('/bup/update-bup-datang/{id}', [BupController::class, 'updateDatang'])->name('bup.datang.update');

    Route::get('/bup/create-bup-berangkat', [BupController::class, 'createBerangkat'])->name('bup.berangkat.create');
    Route::post('/bup/create-bup-berangkat', [BupController::class, 'storeBerangkat'])->name('bup.berangkat.store');
    Route::get('/bup/{id}/edit-bup-berangkat/', [BupController::class, 'editBerangkat'])->name('bup.berangkat.edit');
    Route::put('/bup/update-bup-berangkat/{id}', [BupController::class, 'updateBerangkat'])->name('bup.berangkat.update');

    Route::get('/bup/show/{id}', [BupController::class, 'show'])->name('bup.show');
    Route::get('/bup/delete/{id}', [BupController::class, 'destroy'])->name('bup.destroy');
    Route::post('/bup/laporan', [BupController::class, 'cetakLaporan'])->name('bup.laporan');


    // pelnas
    Route::get('/pelnas/index', [PelnasController::class, 'index'])->name('pelnas.index');
    Route::get('/pelnas/create-pelnas-datang', [PelnasController::class, 'createDatang'])->name('pelnas.datang.create');
    Route::post('/pelnas/store-pelnas-datang', [PelnasController::class, 'storeDatang'])->name('pelnas.datang.store');
    Route::get('/pelnas/{id}/edit-pelnas-datang/', [PelnasController::class, 'editDatang'])->name('pelnas.datang.edit');
    Route::put('/pelnas/update-pelnas-datang/{id}', [PelnasController::class, 'updateDatang'])->name('pelnas.datang.update');

    Route::get('/pelnas/create-pelnas-berangkat', [PelnasController::class, 'createBerangkat'])->name('pelnas.berangkat.create');
    Route::post('/pelnas/create-pelnas-berangkat', [PelnasController::class, 'storeBerangkat'])->name('pelnas.berangkat.store');
    Route::get('/pelnas/{id}/edit-pelnas-berangkat/', [PelnasController::class, 'editBerangkat'])->name('pelnas.berangkat.edit');
    Route::put('/pelnas/update-pelnas-berangkat/{id}', [PelnasController::class, 'updateBerangkat'])->name('pelnas.berangkat.update');

    Route::get('/pelnas/show/{id}', [PelnasController::class, 'show'])->name('pelnas.show');
    Route::get('/pelnas/delete/{id}', [PelnasController::class, 'destroy'])->name('pelnas.destroy');
    Route::post('/pelnas/laporan', [PelnasController::class, 'cetakLaporan'])->name('pelnas.laporan');

    // keagenan kapal
    Route::get('/keagenan_kapal/index', [KeagenankapalController::class, 'index'])->name('keagenan_kapal.index');
    Route::get('/keagenan_kapal/create-keagenan_kapal-datang', [KeagenankapalController::class, 'createDatang'])->name('keagenan_kapal.datang.create');
    Route::post('/keagenan_kapal/store-keagenan_kapal-datang', [KeagenankapalController::class, 'storeDatang'])->name('keagenan_kapal.datang.store');
    Route::get('/keagenan_kapal/{id}/edit-keagenan_kapal-datang/', [KeagenankapalController::class, 'editDatang'])->name('keagenan_kapal.datang.edit');
    Route::put('/keagenan_kapal/update-keagenan_kapal-datang/{id}', [KeagenankapalController::class, 'updateDatang'])->name('keagenan_kapal.datang.update');

    Route::get('/keagenan_kapal/create-keagenan_kapal-berangkat', [KeagenankapalController::class, 'createBerangkat'])->name('keagenan_kapal.berangkat.create');
    Route::post('/keagenan_kapal/create-keagenan_kapal-berangkat', [KeagenankapalController::class, 'storeBerangkat'])->name('keagenan_kapal.berangkat.store');
    Route::get('/keagenan_kapal/{id}/edit-keagenan_kapal-berangkat/', [KeagenankapalController::class, 'editBerangkat'])->name('keagenan_kapal.berangkat.edit');
    Route::put('/keagenan_kapal/update-keagenan_kapal-berangkat/{id}', [KeagenankapalController::class, 'updateBerangkat'])->name('keagenan_kapal.berangkat.update');

    Route::get('/keagenan_kapal/show/{id}', [KeagenankapalController::class, 'show'])->name('keagenan_kapal.show');
    Route::get('/keagenan_kapal/delete/{id}', [KeagenankapalController::class, 'destroy'])->name('keagenan_kapal.destroy');
    Route::post('/keagenan_kapal/laporan', [KeagenankapalController::class, 'cetakLaporan'])->name('keagenan_kapal.laporan');

    // PBM
    Route::get('/pbm/index', [PbmController::class, 'index'])->name('pbm.index');
    Route::get('/pbm/create-pbm-muat', [PbmController::class, 'createMuat'])->name('pbm.muat.create');
    Route::post('/pbm/store-pbm-muat', [PbmController::class, 'storeMuat'])->name('pbm.muat.store');
    Route::get('/pbm/{id}/edit-pbm-muat/', [PbmController::class, 'editMuat'])->name('pbm.muat.edit');
    Route::put('/pbm/update-pbm-muat/{id}', [PbmController::class, 'updateMuat'])->name('pbm.muat.update');

    Route::get('/pbm/create-pbm-bongkar', [PbmController::class, 'createBongkar'])->name('pbm.bongkar.create');
    Route::post('/pbm/create-pbm-bongkar', [PbmController::class, 'storeBongkar'])->name('pbm.bongkar.store');
    Route::get('/pbm/{id}/edit-pbm-bongkar/', [PbmController::class, 'editBongkar'])->name('pbm.bongkar.edit');
    Route::put('/pbm/update-pbm-bongkar/{id}', [PbmController::class, 'updateBongkar'])->name('pbm.bongkar.update');

    Route::get('/pbm/show/{id}', [PbmController::class, 'show'])->name('pbm.show');
    Route::get('/pbm/delete/{id}', [PbmController::class, 'destroy'])->name('pbm.destroy');
    Route::post('/pbm/laporan', [PbmController::class, 'cetakLaporan'])->name('pbm.laporan');

    // JPT
    Route::get('/jpt/index', [JptController::class, 'index'])->name('jpt.index');
    Route::get('/jpt/create-jpt-muat', [JptController::class, 'createMuat'])->name('jpt.muat.create');
    Route::post('/jpt/store-jpt-muat', [JptController::class, 'storeMuat'])->name('jpt.muat.store');
    Route::get('/jpt/{id}/edit-jpt-muat/', [JptController::class, 'editMuat'])->name('jpt.muat.edit');
    Route::put('/jpt/update-jpt-muat/{id}', [JptController::class, 'updateMuat'])->name('jpt.muat.update');

    Route::get('/jpt/create-jpt-bongkar', [JptController::class, 'createBongkar'])->name('jpt.bongkar.create');
    Route::post('/jpt/create-jpt-bongkar', [JptController::class, 'storeBongkar'])->name('jpt.bongkar.store');
    Route::get('/jpt/{id}/edit-jpt-bongkar/', [JptController::class, 'editBongkar'])->name('jpt.bongkar.edit');
    Route::put('/jpt/update-jpt-bongkar/{id}', [JptController::class, 'updateBongkar'])->name('jpt.bongkar.update');

    Route::get('/jpt/show/{id}', [JptController::class, 'show'])->name('jpt.show');
    Route::get('/jpt/delete/{id}', [JptController::class, 'destroy'])->name('jpt.destroy');
    Route::post('/jpt/laporan', [JptController::class, 'cetakLaporan'])->name('jpt.laporan');

    // PELRA
    Route::get('/pelra/index', [PelraController::class, 'index'])->name('pelra.index');
    Route::get('/pelra/create-pelra-datang', [PelraController::class, 'createdatang'])->name('pelra.datang.create');
    Route::post('/pelra/store-pelra-datang', [PelraController::class, 'storedatang'])->name('pelra.datang.store');
    Route::get('/pelra/{id}/edit-pelra-datang/', [PelraController::class, 'editdatang'])->name('pelra.datang.edit');
    Route::put('/pelra/update-pelra-datang/{id}', [PelraController::class, 'updatedatang'])->name('pelra.datang.update');

    Route::get('/pelra/create-pelra-berangkat', [PelraController::class, 'createberangkat'])->name('pelra.berangkat.create');
    Route::post('/pelra/create-pelra-berangkat', [PelraController::class, 'storeberangkat'])->name('pelra.berangkat.store');
    Route::get('/pelra/{id}/edit-pelra-berangkat/', [PelraController::class, 'editberangkat'])->name('pelra.berangkat.edit');
    Route::put('/pelra/update-pelra-berangkat/{id}', [PelraController::class, 'updateberangkat'])->name('pelra.berangkat.update');

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
