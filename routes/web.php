<?php

use App\Http\Controllers\ArchitectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderUserController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StyleInteriorController;
use App\Http\Controllers\TypeInteriorController;
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

Route::get('/', [HomeController::class, 'landingPage']);
Route::get('/home', [HomeController::class, 'landingPage']);

Auth::routes();

Route::middleware('auth:web')->group(function(){

    Route::group(['prefix' => 'order-user', 'as' => 'orderUser.'],function () {
        Route::resource('/', OrderUserController::class)->parameters([
            '' => 'order'
        ]); 
        Route::patch('{order}/update-komentar', [OrderUserController::class, 'updateKomentar'])->name('updateKomentar');
        Route::patch('{order}/upload', [OrderUserController::class, 'uploadBuktiBayar'])->name('uploadBuktiBayar');
        Route::get('nota/{order}', [OrderUserController::class, 'printNota'])->name('printNota');
    });
       
    Route::get('profile-user', [ProfileController::class, 'editUser'])->name('profile.editUser');
    Route::patch('profile-user', [ProfileController::class, 'updateUser'])->name('profile.updateUser');
});

Route::prefix('employee')->name('employee.')->group(function(){
    Route::get('login', [LoginController::class, 'showEmployeeLoginForm']);
    Route::post('login', [LoginController::class, 'employeeLogin'])->name('login');

    Route::middleware('auth:employee')->group(function(){
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::get('profile', [ProfileController::class, 'editEmployee'])->name('profile.editEmployee');
        Route::patch('profile', [ProfileController::class, 'updateEmployee'])->name('profile.updateEmployee');

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

        Route::group(['prefix' => 'type-interior', 'as' => 'typeInterior.'],function () {
            Route::resource('/', TypeInteriorController::class)->parameters([
                '' => 'type_interior'
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

        Route::group(['prefix' => 'portfolio', 'as' => 'portfolio.'],function () {
            Route::resource('/', PortfolioController::class)->parameters([
                '' => 'portfolio'
            ]);
        });

        Route::group(['prefix' => 'company', 'as' => 'company.'],function () {
            Route::resource('/', CompanyController::class)->parameters([
                '' => 'company'
            ]);
        });


        Route::post('logout', [LogoutController::class, 'employeeLogout'])->name('logout');
   
    });
});
