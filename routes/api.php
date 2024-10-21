<?php

use App\Http\Controllers\Api\DokterController;
use App\Http\Controllers\Api\DonorController;
use App\Http\Controllers\Api\UserAdminController;
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
// Route ke dokter API
// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/doctorsapi', [DokterController::class, 'index']);
    Route::post('/doctorsapi/create', [DokterController::class, 'store']);
    Route::get('/doctorsapi/{id}', [DokterController::class, 'show']);
    Route::post('/doctorsapi/{id}', [DokterController::class, 'update']);
    Route::delete('/doctorsapi/{id}', [DokterController::class, 'destroy']);
// });

// Route ke User/Admin API
Route::get('/userapi', [UserAdminController::class, 'index']);
    Route::get('/userapi/{id}', [UserAdminController::class, 'show']);
    Route::delete('/userapi/{id}', [UserAdminController::class, 'destroy']);

// Route ke Pendonor API
Route::get('/donorapi', [DonorController::class, 'index']);
    Route::post('/donorapi/create', [DonorController::class, 'store']);
    Route::get('/donorapi/{id}', [DonorController::class, 'show']);
    Route::post('/donorapi/{id}', [DonorController::class, 'update']);
    Route::delete('/donorapi/{id}', [DonorController::class, 'destroy']);