<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppApiController;

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

Route::get('category/list', [AppApiController::class, 'index']);
Route::post('category/store', [AppApiController::class, 'store']);
Route::get('category/edit/{id}', [AppApiController::class, 'edit']);
Route::get('category/delete/{id}', [AppApiController::class, 'delete']);
Route::post('category/update', [AppApiController::class, 'update']);
