<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->middleware('guest')->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'registerIndex')->name('register');
    Route::post('/register', 'register');
});

Route::controller(AdminController::class)->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/user/setting', 'setting') ->name('admin.setting');
});
