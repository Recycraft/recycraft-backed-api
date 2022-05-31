<?php

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HandicraftController;
use App\Http\Controllers\ScrapCategoryController;

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
    Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
    Route::get('/admin/setting', 'setting')->name('admin.setting');

    #Users
    Route::get('/admin/users', 'index')->name('admin.users');

    #Scraps Categories
    Route::get('/admin/scrap-categories', [ScrapCategoryController::class, 'index'])->name('admin.scrap-categories');

    #Handicrafts
    Route::get('/admin/handicrafts', [HandicraftController::class, 'index'])->name('admin.handicrafts');
    // Route::post('/dashboard/handicrafts/{handicrafts:id}/edit', [HandicraftController::class, 'update']);
    // Route::delete('/dashboard/handicrafts', [HandicraftController::class, 'destroy']);

    #User Feedback
    Route::get('/dashboard/feedback', 'index')->name('feedback');
});
