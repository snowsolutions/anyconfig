<?php

namespace SnowSolution\AnyConfig;

use Illuminate\Support\ServiceProvider;
use SnowSolution\AnyConfig\Traits\Bootstrap as ConfigurationBootstrap;

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

        /**
         * Publish database migration
         */
//        if ($this->app->runningInConsole()) {
//            // Export the migration
//            if (! class_exists('CreateAnyConfigurationTable')) {
//                $this->publishes([
//                    __DIR__ . '/../database/migrations/create_configuration_table.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_configuration_table.php'),
//                    // you can add any number of migrations here
//                ], 'migrations');
//            }
//        }

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        ConfigurationBootstrap::init();
    }
}