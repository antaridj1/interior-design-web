<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('landing-page');
});

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');

    Route::group(['prefix' => 'order', 'as' => 'order.'],function () {
        Route::resource('/', OrderController::class)->parameters([
            '' => 'order'
        ]);
        Route::get('/menu', [OrderController::class, 'menu'])->name('menu');
        Route::patch('/{order}/verifikasi', [OrderController::class, 'verifikasi'])->name('verifikasi');
        
    });

    Route::group(['prefix' => 'pegawai', 'as' => 'pegawai.'],function () {
        Route::resource('/', PegawaiController::class)->parameters([
            '' => 'pegawai'
        ]);
        Route::patch('/{pegawai}/update-status', [PegawaiController::class, 'update_status'])->name('updateStatus');
    });

    Route::group(['prefix' => 'unit', 'as' => 'unit.'],function () {
        Route::resource('/', UnitController::class)->parameters([
            '' => 'unit'
        ]);
        Route::patch('/{unit}/update-status', [UnitController::class, 'update_status'])->name('updateStatus');
    });

    Route::group(['prefix' => 'saran', 'as' => 'saran.'],function () {
        Route::resource('/', SaranController::class)->parameters([
            '' => 'saran'
        ]);
    });
   
});
