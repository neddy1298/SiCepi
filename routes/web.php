<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WritingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\QuoteController;
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
    Route::get('/{topic}',[FrontController::class, 'quoteby_topic'])->name('quotes');
});

Route::group(['prefix' => 'author', 'as' => 'author.'], function () {

    Route::get('/', [FrontController::class, 'author'])->name('view');
    Route::get('{author}',[FrontController::class, 'quoteby_author'])->name('quotes');
});

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('quote', [CategoryController::class, 'quote'])->name('quote');
    Route::get('{category}', [CategoryController::class, 'index'])->name('view');
    Route::get('detail/{id}',[CategoryController::class, 'detail'])->name('detail');
    Route::post('detail/{id}',[CategoryController::class, 'writing_save'])->name('writing_save')->middleware('auth');
});

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {

    Route::get('/',[FrontController::class, 'login'])->name('login');

    // User Setting
    Route::get('/my_profile',[UserController::class, 'profile_front'])->name('profile');
    Route::get('/my_password',[UserController::class, 'profile_password_front'])->name('profile_password');

    // Save
    Route::get('/save',[QuoteController::class, 'save'])->name('save')->middleware('auth');
    Route::post('/save/{id}', [QuoteController::class, 'save_store'])->name('save_store')->middleware('auth');
    Route::get('/save/{id}', [QuoteController::class, 'save_destroy'])->name('save_destroy')->middleware('auth');
    // Route::get('/save/edit/{id}', [QuoteController::class, 'save_edit'])->name('save_edit')->middleware('auth');
    // Route::post('/save/edit/{id}', [QuoteController::class, 'save_update'])->name('save_update')->middleware('auth');

    // Favorite
    Route::get('/favorite',[QuoteController::class, 'favorite'])->name('favorite')->middleware('auth');
    Route::post('/favorite/{id}', [QuoteController::class, 'favorite_store'])->name('favorite_store')->middleware('auth');
    Route::get('/favorite/{id}', [QuoteController::class, 'favorite_destroy'])->name('favorite_destroy')->middleware('auth');


    Route::get('/quote',[QuoteController::class, 'user_quote'])->name('quote')->middleware('auth');
    Route::get('/other-quote',[QuoteController::class, 'user_other_quote'])->name('quote_other')->middleware('auth');
    Route::get('/other-quote-detail/{id}',[QuoteController::class, 'user_other_quote_detail'])->name('quote_other_detail')->middleware('auth');


    // Create Quote
    Route::get('/create-quote',[QuoteController::class, 'create_quote'])->name('create_quote')->middleware('auth');
    Route::post('/create-quote',[QuoteController::class, 'quote_store'])->name('quote_store')->middleware('auth');
    Route::get('/edit-quote/{id}',[QuoteController::class, 'edit_quote'])->name('edit_quote')->middleware('auth');
    Route::post('/edit-quote/{id}',[QuoteController::class, 'quote_update'])->name('quote_update')->middleware('auth');

    // Create Other
    Route::get('/create-other',[QuoteController::class, 'create_other'])->name('create_other')->middleware('auth');
    Route::post('/create-other',[QuoteController::class, 'other_store'])->name('other_store')->middleware('auth');

    Route::get('/fill-other/{id}',[QuoteController::class, 'build_other'])->name('build_other')->middleware('auth');
    Route::post('/fill-other/{id}',[QuoteController::class, 'build_other_store'])->name('build_other_store')->middleware('auth');

    Route::get('/edit-other/{id}',[QuoteController::class, 'edit_other'])->name('edit_other')->middleware('auth');
    Route::post('/edit-other/{id}',[QuoteController::class, 'update_other'])->name('other_update')->middleware('auth');

    Route::get('/purchase',[QuoteController::class, 'purchase'])->name('purchase')->middleware('auth');
    Route::post('/purchase',[QuoteController::class, 'purchase_store'])->name('purchase_store')->middleware('auth');
    Route::get('/purchase_history',[QuoteController::class, 'purchase_history'])->name('purchase_history')->middleware('auth');

});

Route::get('/search', [QuoteController::class, 'search'])->name('quote.search');
Route::get('/save/{id}', [QuoteController::class, 'save'])->name('save')->middleware('auth');
Route::get('/save/{id}', [QuoteController::class, 'save'])->name('save')->middleware('auth');


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
        Route::get('/simple',[WritingController::class, 'create'])->name('create_quote');

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

