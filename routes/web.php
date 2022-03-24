<?php

use App\Http\Controllers\Backend\BenderaController;
use App\Http\Controllers\Backend\PelabuhanController;
use App\Http\Controllers\Backend\TerminalController;
use App\Http\Controllers\Backend\JeniskapalController;
use App\Http\Controllers\Backend\StatustrayekController;
use App\Http\Controllers\Backend\TersusController;
use App\Http\Controllers\Backend\TersusdatangController;
use App\Http\Controllers\Backend\UserdataController;
use App\Models\Tersus;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Ternary;

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
    return view('layouts.admin');
});

Route::resource('/bendera', BenderaController::class);
Route::resource('/pelabuhan', PelabuhanController::class);
Route::resource('/terminal', TerminalController::class);
Route::resource('/jenis_kapal', JeniskapalController::class);
Route::resource('/status_trayek', StatustrayekController::class);
Route::resource('/tersus', TersusController::class);
Route::resource('/tersus_datang', TersusdatangController::class);
Route::resource('/user', UserdataController::class);
