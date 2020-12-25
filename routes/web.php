<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WritingController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;

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


Route::namespace('Auth')->group(function () {
    Route::get('/login',[AuthController::class, 'loginForm'])->name('login');
    Route::post('/login',[AuthController::class, 'login'])->name('login');
    Route::get('/register',[AuthController::class, 'registerForm'])->name('register');
    Route::post('/register',[AuthController::class, 'register'])->name('register');
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
  });

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/',[DashboardController::class, 'index'])->name('index');

    // Writing
    Route::group(['prefix' => 'writing', 'as' => 'writing.'], function () {
        Route::get('/',[WritingController::class, 'index'])->name('index');
        Route::get('/new',[WritingController::class, 'create'])->name('create');
        Route::get('/new_fill',[WritingController::class, 'fill'])->name('fill');
        Route::post('/new_fill',[WritingController::class, 'store'])->name('store');
    });

    // User
    Route::group(['as' => 'user.'], function () {

        Route::get('/user_list',[UserController::class, 'index'])->name('index');
        Route::get('/user_create',[UserController::class, 'create'])->name('create');
        Route::post('/user_create',[UserController::class, 'store'])->name('store');
        Route::get('/user_edit/{user_id}',[UserController::class, 'edit'])->name('edit');
        Route::post('/user_edit/{user_id}',[UserController::class, 'update'])->name('update');
        Route::get('/user_delete/{user_id}',[UserController::class, 'destroy'])->name('destroy');

    });

    // Writing Management
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/list_template',[TemplateController::class, 'index'])->name('template');
        Route::get('/new_template',[TemplateController::class, 'create'])->name('new_template');
        // Route::post('/new',[TemplateController::class, 'store'])->name('store');
        Route::get('/list_user_writing',[WritingController::class, 'user_writing'])->name('user_writing');
        Route::get('/list_tag',[TagController::class, 'index'])->name('tag');

    });

});

Route::get('/table', function () {
    return view('app.table');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/skeleton', function () {
    return view('layouts.skeleton');
});
