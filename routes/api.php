<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => 'auth:sanctum'], function () {
    //All secure URL's
    Route::get('list', [DeviceController::class, 'list']);
    Route::get('singleList/{id?}', [DeviceController::class, 'singleList']);

});
Route::post('add', [DeviceController::class, 'add']);
Route::put('update', [DeviceController::class, 'update']);
Route::delete('delete/{id}', [DeviceController::class, 'delete']);
Route::get('search/{name}', [DeviceController::class, 'search']);
Route::post('save', [DeviceController::class, 'testData']);

Route::post("login", [UserController::class, 'index']);
Route::post("upload", [UserController::class, 'upload']);
