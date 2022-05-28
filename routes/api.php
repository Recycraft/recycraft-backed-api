<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HandicraftController;
use App\Http\Controllers\ScrapCategoryController;

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

Route::controller(AuthController::class)->middleware('guest')->group(function () {
    Route::post('/login', 'logInApi');
    Route::post('/register', 'registerApi');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/user/profile', 'getProfile');
        Route::post('/logout', 'logOutApi');
    });

    Route::controller(HandicraftController::class)->group(function () {
        Route::get('/handicraft', 'getAll');
        Route::get('/handicraft/{id}', 'getById');
    });

    Route::controller(ScrapCategoryController::class)->group(function () {
        Route::get('/category', 'getAll');
        Route::get('/category-with-handicrafts', 'getAllWithCrafts');
        Route::get('/category/{id}', 'getById');
    });
});
