<?php

namespace Angecode\LaravelNovaCmsPages;


use Illuminate\Support\ServiceProvider;

class LaravelNovaCmsPagesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../../../database/migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }
}