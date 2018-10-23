<?php

namespace sbtsdev\LaravelClickupErrorReports;

use Illuminate\Support\ServiceProvider;

class LaravelClickupErrorReportsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'sbtsdev');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'sbtsdev');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravelclickuperrorreports.php', 'laravelclickuperrorreports');

        // Register the service the package provides.
        $this->app->singleton('laravelclickuperrorreports', function ($app) {
            return new LaravelClickupErrorReports;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelclickuperrorreports'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravelclickuperrorreports.php' => config_path('laravelclickuperrorreports.php'),
        ], 'laravelclickuperrorreports.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/sbtsdev'),
        ], 'laravelclickuperrorreports.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/sbtsdev'),
        ], 'laravelclickuperrorreports.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/sbtsdev'),
        ], 'laravelclickuperrorreports.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
