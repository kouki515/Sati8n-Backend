<?php

use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user', [UserController::class, 'store']);
Route::post('/user/profile', [UserDetailController::class, 'store']);

Route::get('user/profile', [UserDetailController::class, 'show']);

Route::post('/record', [RecordController::class, 'store']);
Route::get('/record', [RecordController::class, 'show']);
