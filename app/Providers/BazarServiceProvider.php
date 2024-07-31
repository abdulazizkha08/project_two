<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Bazar;

class BazarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share the 'bazars' variable with all views
        View::composer('*', function ($view) {
            $view->with('bazars', Bazar::all());
        });
    }
}
