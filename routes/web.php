<?php

use App\Http\Controllers\Backend\BenderaController;
use App\Http\Controllers\Backend\BupController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\JeniskapalController;
use App\Http\Controllers\Backend\KeagenankapalController;
use App\Http\Controllers\Backend\PelabuhanController;
use App\Http\Controllers\Backend\TerminalController;
use App\Http\Controllers\Backend\PelnasController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\StatuskapalController;
use App\Http\Controllers\Backend\StatustrayekController;
use App\Http\Controllers\Backend\TersusController;
use App\Http\Controllers\Backend\UserController;
use App\Models\JenisKapal;
use App\Models\StatusKapal;
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
    Route::resource('/pelabuhan', PelabuhanController::class);
    Route::resource('/terminal', TerminalController::class);
    Route::resource('/status_kapal', StatuskapalController::class);
    Route::resource('/jenis_kapal', JeniskapalController::class);
    Route::resource('/status_trayek', StatustrayekController::class);

    // Tersus
    Route::get('/tersus/index', [TersusController::class, 'index'])->name('tersus.index');
    Route::get('/tersus/create-tersus-datang', [TersusController::class, 'createDatang'])->name('tersus.datang.create');
    Route::post('/tersus/store-tersus-datang', [TersusController::class, 'storeDatang'])->name('tersus.datang.store');
    Route::get('/tersus/{id}/edit-tersus-datang/', [TersusController::class, 'editDatang'])->name('tersus.datang.edit');
    Route::put('/tersus/update-tersus-datang/{id}', [TersusController::class, 'updateDatang'])->name('tersus.datang.update');

    Route::get('/tersus/create-tersus-berangkat', [TersusController::class, 'createBerangkat'])->name('tersus.berangkat.create');
    Route::post('/tersus/create-tersus-berangkat', [TersusController::class, 'storeBerangkat'])->name('tersus.berangkat.store');
    Route::get('/tersus/{id}/edit-tersus-berangkat/', [TersusController::class, 'editBerangkat'])->name('tersus.berangkat.edit');
    Route::put('/tersus/update-tersus-berangkat/{id}', [TersusController::class, 'updateBerangkat'])->name('tersus.berangkat.update');

    Route::get('/tersus/show/{id}', [TersusController::class, 'show'])->name('tersus.show');
    Route::delete('/tersus/delete/{id}', [TersusController::class, 'destroy'])->name('tersus.destroy');

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
    Route::delete('/bup/delete/{id}', [BupController::class, 'destroy'])->name('bup.destroy');


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
    Route::delete('/pelnas/delete/{id}', [PelnasController::class, 'destroy'])->name('pelnas.destroy');

    // keagenan kapal
    Route::get('/keagenan_kapal/index', [KeagenankapalController::class, 'index'])->name('keagenan_kapal.index');
    Route::get('/keagenan_kapal/create-pelnas-datang', [KeagenankapalController::class, 'createDatang'])->name('keagenan_kapal.datang.create');
    Route::post('/keagenan_kapal/store-pelnas-datang', [KeagenankapalController::class, 'storeDatang'])->name('keagenan_kapal.datang.store');
    Route::get('/keagenan_kapal/{id}/edit-pelnas-datang/', [KeagenankapalController::class, 'editDatang'])->name('keagenan_kapal.datang.edit');
    Route::put('/keagenan_kapal/update-pelnas-datang/{id}', [KeagenankapalController::class, 'updateDatang'])->name('keagenan_kapal.datang.update');

    Route::get('/keagenan_kapal/create-pelnas-berangkat', [KeagenankapalController::class, 'createBerangkat'])->name('keagenan_kapal.berangkat.create');
    Route::post('/keagenan_kapal/create-pelnas-berangkat', [KeagenankapalController::class, 'storeBerangkat'])->name('keagenan_kapal.berangkat.store');
    Route::get('/keagenan_kapal/{id}/edit-pelnas-berangkat/', [KeagenankapalController::class, 'editBerangkat'])->name('keagenan_kapal.berangkat.edit');
    Route::put('/keagenan_kapal/update-pelnas-berangkat/{id}', [KeagenankapalController::class, 'updateBerangkat'])->name('keagenan_kapal.berangkat.update');

    Route::get('/keagenan_kapal/show/{id}', [KeagenankapalController::class, 'show'])->name('keagenan_kapal.show');
    Route::delete('/keagenan_kapal/delete/{id}', [KeagenankapalController::class, 'destroy'])->name('keagenan_kapal.destroy');

    // user
    Route::resource('/user', UserController::class);
    Route::get('/user/reset-password/{id}', [UserController::class, 'resetPassword'])->name('user.reset.password');
    Route::get('/user/update-status/{id}', [UserController::class, 'updateStatus'])->name('user.reset.status');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/updateGeneralData/{id}', [ProfileController::class, 'updateGeneralData'])->name('profile.update.data');
    Route::put('/profile/updatePassword/{id}', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::put('/profile/updateAVatar/{id}', [ProfileController::class, 'updateImage'])->name('profile.update.avatar');
});
