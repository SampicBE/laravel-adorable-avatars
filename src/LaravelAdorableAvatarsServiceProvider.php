<?php

namespace Sampic\LaravelAdorableAvatars;

use Illuminate\Support\ServiceProvider;

/**
 * Class LaravelAdorableAvatarsServiceProvider
 * @package Sampic\LaravelAdorableAvatars
 */
class LaravelAdorableAvatarsServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/adorableavatars.php');
        $this->publishes([$source => config_path('adorableavatars.php')]);
        $this->mergeConfigFrom($source, 'adorableavatars');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('AdorableAvatars', function ($app) {
            return new AdorableAvatars($app['config']);
        });
    }
}
