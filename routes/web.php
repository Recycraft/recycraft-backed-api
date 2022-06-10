<?php

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HandicraftController;
use App\Http\Controllers\ScrapCategoryController;
use App\Http\Resources\ScrapCategoryResource;

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
    // Route::get('/', 'index');
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'registerIndex')->name('register');
    Route::post('/register', 'register');
});

Route::middleware(['admin', 'auth'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'index')->name('dashboard');
        Route::get('/admin/setting', 'setting')->name('setting');

        #Users
        Route::get('/admin/users', 'index')->name('users');

    });

    #Scraps Categories
    Route::controller(ScrapCategoryController::class)->group(function () {
        Route::get('/admin/scrap', 'index')->name('scrap.index');
        Route::get('/admin/scrap/create', 'create')->name('scrap.create');
        Route::post('/admin/scrap/', 'store')->name('scrap.store');
        Route::get('/admin/scrap/checkSlug',  'checkSlug');
        Route::put('/admin/scrap/{scrapCategory:slug}', 'update')->name('scrap.update');
        Route::get('/admin/scrap/{scrapCategory:slug}', 'show')->name('scrap.show');
        Route::get('/admin/scrap/{scrapCategory:slug}/edit', 'edit')->name('scrap.edit');
        Route::delete('/admin/scrap/{scrapCategory:slug}', 'destroy')->name('scrap.destroy');
    });


    #Handicrafts
    Route::controller(HandicraftController::class)->group(function () {
        Route::get('/admin/handicraft', 'index')->name('handicraft.index');
        Route::get('/admin/handicraft/create', 'create')->name('handicraft.create');
        Route::post('/admin/handicraft', 'store')->name('handicraft.store');
        Route::get('/admin/handicraft/checkSlug',  'checkSlug');
        Route::put('/admin/handicraft/{handicraft:slug}', 'update')->name('handicraft.update');
        Route::get('/admin/handicraft/{handicraft:slug}', 'show')->name('handicraft.show');
        Route::get('/admin/handicraft/{handicraft:slug}/edit', 'edit')->name('handicraft.edit');
        Route::delete('/admin/handicraft/{handicraft:slug}', 'destroy')->name('handicraft.destroy');
    });
});

