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
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'read'])
    ->name('read');
Route::middleware('auth:sanctum')->get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'readId'])
    ->name('readId');

Route::middleware('auth:sanctum')->post('/products', [\App\Http\Controllers\ProductController::class, 'create'])
    ->name('create');
Route::middleware('auth:sanctum')->post('/products/{id}', [\App\Http\Controllers\ProductController::class, 'createId'])
    ->name('createId');
Route::middleware('auth:sanctum')->put('/products', [\App\Http\Controllers\ProductController::class, 'update'])
    ->name('update');
Route::middleware('auth:sanctum')->put('/products/{id}', [\App\Http\Controllers\ProductController::class, 'updateId'])
    ->name('updateId');
Route::middleware('auth:sanctum')->delete('/products', [\App\Http\Controllers\ProductController::class, 'delete'])
    ->name('delete');
Route::middleware('auth:sanctum')->delete('/products/{id}', [\App\Http\Controllers\ProductController::class, 'deleteId'])
    ->name('deleteId');
