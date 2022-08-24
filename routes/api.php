<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::Get('/article', [App\Http\Controllers\PostController::class, 'index']);
Route::Post('/article', [App\Http\Controllers\PostController::class, 'store']);
Route::Get('/article/{id}', [App\Http\Controllers\PostController::class, 'show']);
Route::Patch('/article/{id}', [App\Http\Controllers\PostController::class, 'update']);
Route::Get('/articledelete/{id}', [App\Http\Controllers\PostController::class, 'destroy']);
