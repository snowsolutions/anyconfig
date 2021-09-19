<?php

namespace SnowSolution\AnyConfig;

use Illuminate\Support\ServiceProvider;

class AnyConfigServiceProvider extends ServiceProvider
{

    public function register()
    {

    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'anyconfig');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        /**
         * Publish assets (optional)
         */
        if ($this->app->runningInConsole()) {
            // Publish assets
            $this->publishes([
                __DIR__.'/../resources/assets' => public_path(''),
            ], 'assets');

        }
    }
}