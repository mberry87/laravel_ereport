<?php

use App\Http\Controllers\Backend\BenderaController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PelabuhanController;
use App\Http\Controllers\Backend\TerminalController;
use App\Http\Controllers\Backend\JeniskapalController;
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

    Route::get('/tersus/create-tersus-berangkat', [TersusController::class, 'createTersusBerangkat'])->name('tersus.berangkat.create');
    Route::post('/tersus/create-tersus-berangkat', [TersusController::class, 'storeTersusBerangkat'])->name('tersus.berangkat.store');
    Route::resource('/tersus', TersusController::class);

    Route::resource('/user', UserController::class);
});
