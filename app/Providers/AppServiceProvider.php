<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $prefix = "";
        $links = array(
            "js" => "$prefix/js/app.js",
            "css" => "$prefix/css/app.css",
        );
        View::share("links", $links);
    }
}
