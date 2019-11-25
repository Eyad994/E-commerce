<?php

namespace App\Providers;

use App\Category;
use App\Notification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $categories = Category::with(['products'])->get();
        View::share('categories', $categories);
        View::share('numberAlert', Notification::numberAlert());
        // Resource::withoutWrapping();
    }
}
