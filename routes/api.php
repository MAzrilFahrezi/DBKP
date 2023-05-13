<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\inspectionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kapalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




// Route::post('kapal/update/{id}', [kapalController::class, 'update']);
// Route::delete('kapal/delete/{id}', [kapalController::class, 'delete']);


Route::post('register', [authController::class, 'register']);
Route::post('login', [authController::class, 'login']);
Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('kapal', kapalController::class);
    Route::apiResource('barang', barangController::class);
    Route::post('logout', [authController::class, 'logout']);
    Route::get('user', [authController::class, 'getUser']);
    Route::put('/updateUser', [authController::class, 'updateUser']);
});
