<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\micrositeController;
use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;

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

Route::resource('role', RoleController::class);
Route::resource('microsite', micrositeController::class);
Route::resource('content', ContentController::class);
Route::resource('video', VideoController::class);