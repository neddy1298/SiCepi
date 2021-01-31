<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\Catalog;
use App\Models\PopularAuthor;
use App\Models\PopularTopic;

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
            View::share('Category', Catalog::get());
        });

        view()->composer('*', function ($view) {
            View::share('PopularAuthors', PopularAuthor::get());
        });

        view()->composer('*', function ($view) {
            View::share('PopularTopics', PopularTopic::get());
        });
    }
}
