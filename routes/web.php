<?php

use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\GroupController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ApartmentController;
use App\Http\Controllers\Dashboard\AdsController;
use App\Http\Controllers\Dashboard\ServiceController;
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
return redirect('/login');
});

// Route::get('login',function(){
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard/home',[HomeController::class,'count']);
    Route::resource('/dashboard/user',UserController::class)->except('show');
    Route::resource('/dashboard/role',RoleController::class)->except('show');
    Route::resource('/dashboard/group',GroupController::class)->except('show');
    Route::resource('/dashboard/apartment',ApartmentController::class)->except('show');
    Route::resource('/dashboard/ads',AdsController::class)->except('show');
    Route::resource('/dashboard/service',ServiceController::class)->except('show');

});




Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
