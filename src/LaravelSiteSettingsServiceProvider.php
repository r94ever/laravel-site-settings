<?php

namespace Webcp\LaravelSiteSettings;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Webcp\LaravelSiteSettings\Console\Commands\CreateOption;

class LaravelSiteSettingsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Cache $cache
     * @return mixed
     */
    public function boot(Cache $cache)
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-site-settings.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('/migrations'),
            ], 'migrate');

            // Registering package commands.
            $this->commands([
                CreateOption::class
            ]);
        }

        return Cache::rememberForever(Setting::cacheKey(), function() {
            return Setting::autoload();
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-site-settings');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-site-settings', function () {
            return new Setting;
        });
    }
}
