<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientsController;

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
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::get('clients', [ClientsController::class, 'list']);
Route::get('consumer/{user}', [ClientsController::class, 'data']);
Route::post('consumer', [ClientsController::class, 'store']);
Route::post('change-user-password', [AuthController::class, 'changePassword']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
