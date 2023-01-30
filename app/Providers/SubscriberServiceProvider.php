<?php

namespace App\Providers;

use App\Services\SubscriberService;
use Illuminate\Support\ServiceProvider;

class SubscriberServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(SubscriberService::class, function ($app) {
            return new SubscriberService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
