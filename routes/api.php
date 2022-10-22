<?php

use App\Http\Controllers\Api\AdsCompaniesController;
use App\Http\Controllers\Api\AdvertismentsController;
use App\Http\Controllers\MobileApi\ApartmentsAuthController;
use App\Http\Controllers\Api\ApartmentsController;
use App\Http\Controllers\Api\ApartmentServiceController;
use App\Http\Controllers\Api\ClientsController;
use App\Http\Controllers\Api\GroupsController;
use App\Http\Controllers\Api\RolesController;
use App\Http\Controllers\Api\ServicesController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\MobileApi\AdvertismentsController as MobileApiAdvertismentsController;
use App\Http\Controllers\MobileApi\ServicesController as MobileApiServicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
//////////////////////////////////////////////////////////////////

// Route::middleware('auth:sanctum')->group(function () {
    
//     Route::apiResource('/roles',RolesController::class);

// });

// Front End API/////////////////////////////////////////////////////////
Route::apiResource('/groups',GroupsController::class);
Route::apiResource('/users',UsersController::class);
Route::apiResource('/advertisments',AdvertismentsController::class);
Route::apiResource('/apartments',ApartmentsController::class);
Route::apiResource('/services',ServicesController::class);
Route::apiResource('/apartmentservice',ApartmentServiceController::class);


//////////////////////////////////////////////////////////////////////////////



///// Mobile API////////////////////////////////////////////////////////////////

Route::post('mobile/apartmentauth/login',[ApartmentsAuthController::class,'apartmentlogin']);

////
Route::get('mobile/advertisments',[MobileApiAdvertismentsController::class, 'allAdvertisment']);
//////


//// Mobile Service APT
Route::get('mobile/services',[MobileApiServicesController::class,'allService']);
Route::post('mobile/services/order',[MobileApiServicesController::class,'order']);
Route::get('mobile/services/viewaptorders/{aptid}',[MobileApiServicesController::class,'aptorders']);

//////////////////////////////////////////

