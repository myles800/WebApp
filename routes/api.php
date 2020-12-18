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
Route::middleware('auth:sanctum')->get('/products/read', [\App\Http\Controllers\ProductController::class, 'read'])
    ->name('read');
Route::middleware('auth:sanctum')->get('/products/read/{id}', [\App\Http\Controllers\ProductController::class, 'readId'])
    ->name('readId');

Route::middleware('auth:sanctum')->post('/products/create', [\App\Http\Controllers\ProductController::class, 'create'])
    ->name('create');
Route::middleware('auth:sanctum')->post('/products/create/{id}', [\App\Http\Controllers\ProductController::class, 'createId'])
    ->name('createId');
Route::middleware('auth:sanctum')->put('/products/update', [\App\Http\Controllers\ProductController::class, 'update'])
    ->name('update');
Route::middleware('auth:sanctum')->put('/products/update/{id}', [\App\Http\Controllers\ProductController::class, 'updateId'])
    ->name('updateId');
Route::middleware('auth:sanctum')->delete('/products/delete', [\App\Http\Controllers\ProductController::class, 'delete'])
    ->name('delete');
Route::middleware('auth:sanctum')->delete('/products/delete/{id}', [\App\Http\Controllers\ProductController::class, 'deleteId'])
    ->name('deleteId');
