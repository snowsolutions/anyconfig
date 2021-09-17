<?php

namespace SnowSolution\AnyConfig;

use Illuminate\Support\ServiceProvider;

class AnyConfigServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'snowsolution');
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/routes.php';
        }
    }

    public function boot()
    {
        //
    }
}