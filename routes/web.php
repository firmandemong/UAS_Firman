<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController;

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
    return view('welcome');
});

Route::get('/toko/dashboard', [TokoController::class, 'dashboard']);
Route::resource('/toko', TokoController::class);
Route::get('/login',[LoginController::class,'login']);
Route::post('/login',[LoginController::class,'postlogin']);
Route::post('/logout',[LoginController::class,'logout']);
Route::resource('/transaksi',TransaksiController::class);
