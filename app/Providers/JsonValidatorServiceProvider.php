<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class JsonValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(JsonValidatorService::class, function ($app) {
            return new JsonValidatorService();
        });
    }
}
