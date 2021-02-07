<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\Category;
use App\Models\Author;
use App\Models\Topic;
use App\Models\Writing;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            View::share('Authors', Author::get());
        });

        view()->composer('*', function ($view) {
            View::share('Topics', Topic::get());
        });

        view()->composer('*', function ($view) {
            View::share('Categories', Category::get());
        });

        view()->composer('*', function ($view) {
            View::share('User_Writings', Writing::where('user_id', auth()->user()->id ?? '0')->get()->count());
        });
    }
}
