<?php

use App\Http\Controllers\VehicleController;
use \App\Http\Controllers\MotoCycleController;
use \App\Http\Controllers\CarController;
use \App\Http\Controllers\VehicleTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\DataController;

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

Route::apiResource('/vehicle', \App\Http\Controllers\VehicleController::class);
Route::apiResource('/moto', \App\Http\Controllers\MotoCycleController::class);
Route::apiResource('/car', \App\Http\Controllers\CarController::class);
Route::apiResource('/type', \App\Http\Controllers\VehicleTypeController::class);


Route::post('/register', [UserController::class, 'register']);
Route::post('/logins', [UserController::class,'authenticate']);
Route::get('vehicleAuth', [DataController::class,'vehicleAuth']);

Route::group(['middleware' => ['jwt.verify']], function() {
  Route::get('user', [UserController::class,'getAuthenticatedUser']);
  Route::get('vehicles', [DataController::class, 'vehicles']);
});