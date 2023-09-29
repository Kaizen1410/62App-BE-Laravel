<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Midtrans\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Config::$serverKey = env('SERVER_KEY');
        Config::$clientKey = env('CLIENT_KEY');
        Config::$isProduction = env('MIDTRANS_PRODUCTION', false);
        Config::$is3ds = true;
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
