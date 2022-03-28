<?php

use App\Http\Controllers\Backend\BenderaController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PelabuhanController;
use App\Http\Controllers\Backend\TerminalController;
use App\Http\Controllers\Backend\JeniskapalController;
use App\Http\Controllers\Backend\ProfileController;
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

\Auth::routes([
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('/bendera', BenderaController::class);
    Route::resource('/pelabuhan', PelabuhanController::class);
    Route::resource('/terminal', TerminalController::class);
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

    Route::resource('/user', UserController::class);

    Route::resource('/profile', ProfileController::class);
});
