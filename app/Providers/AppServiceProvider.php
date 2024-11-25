<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Facades\View::composer(['guest.layout.header', 'guest.layout.footer'], function (View $view) {
            $categories = Category::take(3)->get();

            $view->with(compact('categories'));
        });
    }
}
