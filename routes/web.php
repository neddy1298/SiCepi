<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WritingController;
use App\Http\Controllers\RebuildController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\CatalogController;



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

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {

    Route::get('/',[FrontController::class, 'login'])->name('login');

    // Save
    Route::get('/save',[QuoteController::class, 'save'])->name('save')->middleware('auth');
    Route::post('/save/{id}', [QuoteController::class, 'save_store'])->name('save_store')->middleware('auth');

    // Favorite
    Route::get('/favorite',[QuoteController::class, 'favorite'])->name('favorite')->middleware('auth');
    Route::post('/favorite/{id}', [QuoteController::class, 'favorite_store'])->name('favorite_store')->middleware('auth');



    Route::get('/quote',[QuoteController::class, 'user_quote'])->name('quote')->middleware('auth');
    Route::get('/create-quote',[QuoteController::class, 'create_quote'])->name('create_quote')->middleware('auth');
    Route::post('/create-quote',[QuoteController::class, 'quote_store'])->name('quote_store')->middleware('auth');
    Route::get('/edit-quote/{id}',[QuoteController::class, 'edit_quote'])->name('edit_quote')->middleware('auth');
    Route::post('/edit-quote/{id}',[QuoteController::class, 'quote_update'])->name('quote_update')->middleware('auth');
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

// Dashboard
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {

    Route::group(['prefix' => 'error'], function () {

        Route::get('403', function(){
            return view('app.error.403');
        });

        Route::get('404', function(){
            return view('app.error.404');
        });
    });

    Route::get('/',[DashboardController::class, 'index'])->name('index');

    // Writing
    Route::group(['prefix' => 'writing', 'as' => 'writing.'], function () {
        // Create
        Route::get('/',[WritingController::class, 'index'])->name('index');
        Route::get('/new',[WritingController::class, 'create'])->name('create');
        Route::post('/fill',[WritingController::class, 'store'])->name('store');
        Route::get('/fill/{id}',[WritingController::class, 'build'])->name('build');
        Route::post('/fill/{id}',[WritingController::class, 'build_store'])->name('build_store');

        // Rebuild
        Route::get('/rebuild/{id}',[RebuildController::class, 'edit'])->name('rebuild');
        Route::post('/rebuild/{id}',[RebuildController::class, 'store'])->name('rebuild');

        // Edit
        Route::get('/edit/{writing_id}',[WritingController::class, 'edit'])->name('edit');
        Route::post('/edit/{writing_id}',[WritingController::class, 'update'])->name('update');
        Route::get('/delete/{writing_id}',[WritingController::class, 'destroy'])->name('delete');
    });

    // My Writing
    Route::get('/my_writing',[WritingController::class, 'user_index'])->name('user_index');


    // User
    Route::group(['as' => 'user.'], function () {

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
        Route::get('/', [DashboardController::class, 'pricing'])->name('pricing');
    });


    // Writing Management
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function () {

        // New Template
        Route::get('/new_template',[TemplateController::class, 'create'])->name('template_create');
        Route::post('/new_template',[TemplateController::class, 'store'])->name('template_store');
        Route::get('/template_edit/{template_id}',[TemplateController::class, 'edit'])->name('template_edit');
        Route::post('/template_edit/{template_id}',[TemplateController::class, 'update'])->name('template_update');
        Route::get('/template_hapus/{template_id}',[TemplateController::class, 'destroy'])->name('template_destroy');

            // Block
            Route::get('/new_block/{template_id}',[BlockController::class, 'create'])->name('block_create');
            Route::post('/new_block/{template_id}',[BlockController::class, 'store'])->name('block_store');
            Route::get('/edit_block/{block_id}',[BlockController::class, 'edit'])->name('block_edit');
            Route::post('/edit_block/{block_id}',[BlockController::class, 'update'])->name('block_update');
            Route::get('/delete_block/{block_id}',[BlockController::class, 'destroy'])->name('block_delete');


        // List Template
        Route::get('/list_template',[TemplateController::class, 'index'])->name('template');

        // User Writing
        Route::get('/list_user_writing',[WritingController::class, 'user_writing'])->name('user_writing');
        Route::get('/list_user_writing/{id}',[WritingController::class, 'user_writing_detail'])->name('user_writing_detail');

        // Tag Management
        Route::get('/tag_list',[TagController::class, 'index'])->name('tag');
        Route::get('/tag_new',[TagController::class, 'create'])->name('tag_create');
        Route::post('/tag_new',[TagController::class, 'store'])->name('tag_store');
        Route::get('/tag_edit/{tag_id}',[TagController::class, 'edit'])->name('tag_edit');
        Route::post('/tag_edit/{tag_id}',[TagController::class, 'update'])->name('tag_update');
        Route::get('/tag_delete/{tag_id}',[TagController::class, 'destroy'])->name('tag_delete');

        // Catalogs
        Route::get('/catalog_list',[CatalogController::class, 'index'])->name('catalog');
        Route::post('/catalog_new',[CatalogController::class, 'store'])->name('catalog_store');
        Route::post('/catalog_edit/{catalog_id}',[CatalogController::class, 'update'])->name('catalog_update');
        Route::get('/catalog_delete/{catalog_id}',[CatalogController::class, 'destroy'])->name('catalog_delete');

    });

});

