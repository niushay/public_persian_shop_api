<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Address API
Route::get('cities', [AddressController::class,'getAllCities']);
Route::get('states', [AddressController::class,'getAllStates']);
Route::get('cities/{id}', [AddressController::class,'getCitiesOfState']);

//Category API
Route::get('categories',[CategoryController::class,'categories']);
Route::get('category/{id}',[CategoryController::class,'category']);
Route::get('sub_categories/{id}',[CategoryController::class,'subCategories']);


//Products API
