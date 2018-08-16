<?php

namespace iShotFT\RandomAlliterations;

use Illuminate\Support\ServiceProvider;

class RandomAlliterationsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'ishotft');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'ishotft');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__ . '/../config/randomalliterations.php' => config_path('randomalliterations.php'),
            ], 'randomalliterations.config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/ishotft'),
            ], 'randomalliterations.views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/ishotft'),
            ], 'randomalliterations.views');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/ishotft'),
            ], 'randomalliterations.views');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/randomalliterations.php', 'randomalliterations');

        // Register the service the package provides.
        $this->app->singleton('randomalliterations', function ($app) {
            return new RandomAlliterations;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['randomalliterations'];
    }
}