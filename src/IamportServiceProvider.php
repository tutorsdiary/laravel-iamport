<?php

namespace Tuda\Iamport;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class IamportServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/iamport.php', 'iamport');
        $this->publishes([__DIR__ . '/../config/iamport.php' => config_path('iamport.php')]);
    }
    /**
     * Register the service provider
     */
    public function register()
    {
        $this->app->bind(Iamport::class, function () {
            return new Iamport($this->app['config']['iamport']);
        });
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Iamport::class];
    }
}