<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WritingController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlockController;

use App\Models\Tag;

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
    Route::get('/',[DashboardController::class, 'index'])->name('index');

    // Writing
    Route::group(['prefix' => 'writing', 'as' => 'writing.'], function () {
        Route::get('/',[WritingController::class, 'index'])->name('index');
        Route::get('/new',[WritingController::class, 'create'])->name('create');
        Route::post('/fill',[WritingController::class, 'store'])->name('store');
        Route::get('/fill/{id}',[WritingController::class, 'build'])->name('build');
        Route::post('/fill/{id}',[WritingController::class, 'build_store'])->name('build_store');

        Route::get('/edit/{writing_id}',[WritingController::class, 'edit'])->name('edit');
    });

    // User
    Route::group(['as' => 'user.'], function () {

        Route::group(['prefix' => 'settings'], function () {

            Route::get('/my_profile',[UserController::class, 'profile'])->name('profile');
            Route::post('/my_profile/{id}',[UserController::class, 'profile_update'])->name('profile_update');
            Route::get('/my_password',[UserController::class, 'profile_password'])->name('profile_password');
            Route::post('/my_password/{id}',[UserController::class, 'profile_password_update'])->name('password_update');
        });


        Route::get('/user_list',[UserController::class, 'index'])->name('index');
        Route::get('/user_create',[UserController::class, 'create'])->name('create');
        Route::post('/user_create',[UserController::class, 'store'])->name('store');
        Route::get('/user_edit/{user_id}',[UserController::class, 'edit'])->name('edit');
        Route::post('/user_edit/{user_id}',[UserController::class, 'update'])->name('update');
        Route::get('/user_delete/{user_id}',[UserController::class, 'destroy'])->name('destroy');


    });

    // Writing Management
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

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

        // Tag Management
        Route::get('/tag_list',[TagController::class, 'index'])->name('tag');
        Route::get('/tag_new',[TagController::class, 'create'])->name('tag_create');
        Route::post('/tag_new',[TagController::class, 'store'])->name('tag_store');
        Route::get('/tag_edit/{tag_id}',[TagController::class, 'edit'])->name('tag_edit');
        Route::post('/tag_edit/{tag_id}',[TagController::class, 'update'])->name('tag_update');
        Route::get('/tag_delete/{tag_id}',[TagController::class, 'destroy'])->name('tag_delete');

    });

});

Route::get('/test', function () {
    $text = "Test {{name}} dengan email {{email_address}} dan company {{company_name}}";

    $text = explode(" ",$text);
        // echo $text;
        // dd($text);

    // if($text == "{{*}}"){
    //     echo $text;
    // }
    $result = [];
    foreach ($text as $item) {

        $tags = Tag::get();
        foreach ($tags as $tag) {
            if($item == $tag->tag_body){
                echo "true: ". $item . " == ". $tag->tag_body;
                echo "<br>";

                array_push($result, $tag->tag_name);
            }
        }
    }
    // echo "<br>". $result. "<br>";
    dd($result);
});

// Route::get('/login', function () {
//     return view('auth.login');
// });

Route::get('/skeleton', function () {
    return view('layouts.skeleton');
});
