<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private $wiringObjects = [];

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
        array_map(function ($concrete, $abstract) {
            $this->app->bind($abstract, $concrete);
        }, $this->wiringObjects);
    }
}
