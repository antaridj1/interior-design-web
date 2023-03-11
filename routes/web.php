<?php

use App\Http\Controllers\ArchitectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderUserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StyleInteriorController;
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

Route::get('/home', function () {
    return view('landing-page');
});

Auth::routes();

Route::middleware('auth:web')->group(function(){

    Route::group(['prefix' => 'order-user', 'as' => 'orderUser.'],function () {
        Route::resource('/', OrderUserController::class)->parameters([
            '' => 'order'
        ]); 
        Route::patch('{order}/upload', [OrderUserController::class, 'uploadBuktiBayar'])->name('uploadBuktiBayar');
        Route::get('nota/{order}', [OrderUserController::class, 'printNota'])->name('printNota');
    });
       
    Route::get('profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [UserController::class, 'update'])->name('profile.update');
});

Route::prefix('employee')->name('employee.')->group(function(){
    Route::get('login', [LoginController::class, 'showEmployeeLoginForm']);
    Route::post('login', [LoginController::class, 'employeeLogin'])->name('login');

    Route::middleware('auth:employee')->group(function(){
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::get('profile', [UserController::class, 'edit'])->name('profile.edit');
        Route::patch('profile', [UserController::class, 'update'])->name('profile.update');

        Route::group(['prefix' => 'order', 'as' => 'order.'],function () {
            Route::resource('/', OrderController::class)->parameters([
                '' => 'order'
            ]);
            Route::patch('/{order}/updateStatus', [OrderController::class, 'updateStatus'])->name('updateStatus');
            Route::get('nota/{order}', [OrderController::class, 'printNota'])->name('printNota');
        });

        Route::group(['prefix' => 'style-interior', 'as' => 'styleInterior.'],function () {
            Route::resource('/', StyleInteriorController::class)->parameters([
                '' => 'style_interior'
            ]);
        });

        Route::group(['prefix' => 'architect', 'as' => 'architect.'],function () {
            Route::resource('/', ArchitectController::class)->parameters([
                '' => 'architect'
            ]);
            Route::patch('/{architect}/update-status', [ArchitectController::class, 'update_status'])->name('updateStatus');
        });

        Route::group(['prefix' => 'user', 'as' => 'user.'],function () {
            Route::resource('/', UserController::class)->parameters([
                '' => 'user'
            ]);
            Route::patch('/{user}/update-status', [UserController::class, 'update_status'])->name('updateStatus');
        });

        Route::group(['prefix' => 'landing-page', 'as' => 'landingPage.'],function () {
            Route::resource('/', LandingPageController::class)->parameters([
                '' => 'landing-page'
            ]);
        });

        Route::post('logout', [LogoutController::class, 'employeeLogout'])->name('logout');
   
    });
});
