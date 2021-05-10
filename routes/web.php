<?php

use App\Http\Controllers\CsgoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LolController;
use App\Http\Controllers\WalletController;
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

Route::get('/', [DashboardController::class, 'index'])->name('Dashboard');
Route::get('/csgo', [CsgoController::class, 'index'])->name('CSGO');
Route::get('/lol', [LolController::class, 'index'])->name('LOL');
Route::get('/wallet', [WalletController::class, 'index'])->name('Wallet');

