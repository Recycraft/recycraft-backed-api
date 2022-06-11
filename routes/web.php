<?php

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
    return redirect()->secure_url('/login');
});

Route::controller(AuthController::class)->middleware('guest')->group(function () {
    Route::get('/login', 'index');
    Route::post('/login', 'login');
    Route::get('/register', 'registerIndex')->name('register');
    Route::post('/register', 'register');
});

Route::middleware(['admin', 'auth'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'index');
        Route::get('/admin/setting', 'setting');

        #Users
        Route::get('/admin/users', 'index');

    });

    #Scraps Categories
    Route::controller(ScrapCategoryController::class)->group(function () {
        Route::get('/admin/scrap', 'index');
        Route::get('/admin/scrap/create', 'create');
        Route::post('/admin/scrap/', 'store');
        Route::get('/admin/scrap/checkSlug',  'checkSlug');
        Route::put('/admin/scrap/{scrapCategory:slug}', 'update');
        Route::get('/admin/scrap/{scrapCategory:slug}', 'show');
        Route::get('/admin/scrap/{scrapCategory:slug}/edit', 'edit');
        Route::delete('/admin/scrap/{scrapCategory:slug}', 'destroy');
    });


    #Handicrafts
    Route::controller(HandicraftController::class)->group(function () {
        Route::get('/admin/handicraft', 'index');
        Route::get('/admin/handicraft/create', 'create');
        Route::post('/admin/handicraft', 'store');
        Route::get('/admin/handicraft/checkSlug',  'checkSlug');
        Route::put('/admin/handicraft/{handicraft:slug}', 'update');
        Route::get('/admin/handicraft/{handicraft:slug}', 'show');
        Route::get('/admin/handicraft/{handicraft:slug}/edit', 'edit');
        Route::delete('/admin/handicraft/{handicraft:slug}', 'destroy');
    });
});

