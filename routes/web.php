<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WritingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontWritingController;
use App\Http\Controllers\PromoCodeController;
use App\Http\Controllers\PopularController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\TopicController;



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

Route::get('/', [FrontController::class, 'index'])->name('index');

Route::group(['prefix' => 'topics', 'as' => 'topics.'], function () {

    Route::get('/', [FrontController::class, 'topics'])->name('view');
    Route::get('/{topic}',[FrontController::class, 'by_topic'])->name('writing');
});

Route::group(['prefix' => 'author', 'as' => 'author.'], function () {

    Route::get('/', [FrontController::class, 'author'])->name('view');
    Route::get('{author}',[FrontController::class, 'by_author'])->name('writing');
});

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('{category}', [FrontController::class, 'by_category'])->name('category');
    Route::get('detail/{id}',[FrontController::class, 'detail'])->name('detail');
    Route::post('detail/{id}',[FrontController::class, 'writing_save'])->name('writing_save')->middleware('auth');
});

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {

    Route::get('/',[FrontController::class, 'login'])->name('login');

    // User Setting
    Route::get('/my_profile',[UserController::class, 'profile_front'])->name('profile');
    Route::get('/my_password',[UserController::class, 'profile_password_front'])->name('profile_password');

    // Save
    Route::get('/save',[FrontWritingController::class, 'save'])->name('save')->middleware('auth');
    Route::get('/save/{category}',[FrontWritingController::class, 'save_category'])->name('save_category')->middleware('auth');

    Route::post('/save/{id}', [FrontWritingController::class, 'save_store'])->name('save_store')->middleware('auth');
    Route::get('/save/delete/{id}', [FrontWritingController::class, 'save_destroy'])->name('save_destroy')->middleware('auth');
    // Route::get('/save/edit/{id}', [FrontWritingController::class, 'save_edit'])->name('save_edit')->middleware('auth');
    // Route::post('/save/edit/{id}', [FrontWritingController::class, 'save_update'])->name('save_update')->middleware('auth');

    // Favorite
    Route::get('/favorite',[FrontWritingController::class, 'favorite'])->name('favorite')->middleware('auth');
    Route::get('/favorite/{category}',[FrontWritingController::class, 'favorite_category'])->name('favorite_category')->middleware('auth');

    Route::post('/favorite/{id}', [FrontWritingController::class, 'favorite_store'])->name('favorite_store')->middleware('auth');
    Route::get('/favorite/delete/{id}', [FrontWritingController::class, 'favorite_destroy'])->name('favorite_destroy')->middleware('auth');


    Route::get('/writing',[FrontWritingController::class, 'writing'])->name('writing')->middleware('auth');
    Route::get('/writing/{category}',[FrontWritingController::class, 'writing_category'])->name('writing_category')->middleware('auth');
    Route::get('/writing/delete/{id}',[FrontWritingController::class, 'writing_destroy'])->name('writing_destroy')->middleware('auth');


    // Create Quote
    Route::get('/create-writing',[FrontWritingController::class, 'create'])->name('create')->middleware('auth');
    Route::post('/create-writing',[FrontWritingController::class, 'store'])->name('store')->middleware('auth');
    Route::get('/edit-writing/{id}',[FrontWritingController::class, 'edit'])->name('writing_edit')->middleware('auth');
    Route::post('/edit-writing/{id}',[FrontWritingController::class, 'update'])->name('writing_update')->middleware('auth');


    Route::get('/purchase',[FrontWritingController::class, 'purchase'])->name('purchase')->middleware('auth');
    Route::post('/purchase',[FrontWritingController::class, 'purchase_store'])->name('purchase_store')->middleware('auth');
    Route::get('/purchase_history',[FrontWritingController::class, 'purchase_history'])->name('purchase_history')->middleware('auth');

});

Route::get('/search', [FrontWritingController::class, 'search'])->name('writing.search');
Route::get('/save/{id}', [FrontWritingController::class, 'save'])->name('save')->middleware('auth');
Route::get('/save/{id}', [FrontWritingController::class, 'save'])->name('save')->middleware('auth');


// Auth
Route::namespace('Auth')->group(function () {
    Route::get('/login',[AuthController::class, 'loginForm'])->name('login');
    Route::post('/login',[AuthController::class, 'login'])->name('login');
    Route::get('/register',[AuthController::class, 'registerForm'])->name('register');
    Route::post('/register',[AuthController::class, 'register'])->name('register');
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
  });


////////////////
// Dashboard ///
////////////////

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {

    Route::group(['prefix' => 'error'], function () {

        Route::get('403', function(){
            return view('dashboard.app.error.403');
        });

        Route::get('404', function(){
            return view('dashboard.app.error.404');
        });
    });

    Route::get('/',[DashboardController::class, 'index'])->name('index');

    // Writing
    Route::group(['prefix' => 'writing', 'as' => 'writing.'], function () {

        // Create Quote
        Route::get('/simple',[WritingController::class, 'create'])->name('create');

        //
        Route::get('/',[WritingController::class, 'index'])->name('index');
        Route::get('/new',[WritingController::class, 'create'])->name('create');
        Route::post('/fill',[WritingController::class, 'store'])->name('store');
        Route::get('/edit/{writing_id}',[WritingController::class, 'edit'])->name('edit');
        Route::post('/edit/{writing_id}',[WritingController::class, 'update'])->name('update');
        Route::get('/delete/{writing_id}',[WritingController::class, 'destroy'])->name('delete');
    });

    // My Writing
    Route::get('/my_writing',[WritingController::class, 'user_index'])->name('user_index');


    // User
    Route::group(['as' => 'user.', 'middleware' => 'admin'], function () {

        Route::group(['prefix' => 'settings'], function () {

            Route::get('/my_profile',[UserController::class, 'profile'])->name('profile');
            Route::post('/my_profile/{id}',[UserController::class, 'profile_update'])->name('profile_update');
            Route::get('/my_password',[UserController::class, 'profile_password'])->name('profile_password');
            Route::post('/my_password/{id}',[UserController::class, 'profile_password_update'])->name('password_update');
        });


        Route::group(['middleware' => ['admin']], function () {

            Route::get('/user_list',[UserController::class, 'index'])->name('index');
            Route::get('/user_create',[UserController::class, 'create'])->name('create');
            Route::post('/user_create',[UserController::class, 'store'])->name('store');
            Route::get('/user_edit/{user_id}',[UserController::class, 'edit'])->name('edit');
            Route::post('/user_edit/{user_id}',[UserController::class, 'update'])->name('update');
            Route::get('/user_delete/{user_id}',[UserController::class, 'destroy'])->name('destroy');
        });

    });

    Route::group(['prefix' => 'pricing'], function () {
        Route::get('/', [PromoCodeController::class, 'index'])->name('pricing');
        Route::post('/', [PromoCodeController::class, 'store'])->name('pricing_store');
        Route::post('/{id}', [PromoCodeController::class, 'update'])->name('pricing_update');
        Route::get('/delete/{id}', [PromoCodeController::class, 'destroy'])->name('pricing_delete');
        Route::get('/user', [PromoCodeController::class, 'user_history'])->name('pricing_user');
    });

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

        // Category
        Route::get('category', [CategoryController::class, 'index'])->name('index_category');
        Route::post('category', [CategoryController::class, 'store'])->name('store_category');
        Route::post('category/{id}', [CategoryController::class, 'update'])->name('update_category');
        Route::get('category/{id}', [CategoryController::class, 'destroy'])->name('destroy_category');

        // Author
        Route::get('author', [AuthorController::class, 'index'])->name('index_author');
        Route::post('author', [AuthorController::class, 'store'])->name('store_author');
        Route::post('author/{id}', [AuthorController::class, 'update'])->name('update_author');
        Route::get('author/{id}', [AuthorController::class, 'destroy'])->name('destroy_author');

        // Topic
        Route::get('topic', [TopicController::class, 'index'])->name('index_topic');
        Route::post('topic', [TopicController::class, 'store'])->name('store_topic');
        Route::post('topic/{id}', [TopicController::class, 'update'])->name('update_topic');
        Route::get('topic/{id}', [TopicController::class, 'destroy'])->name('destroy_topic');
    });

});

