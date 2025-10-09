<?php

namespace NetBill360;

use Illuminate\Support\ServiceProvider;

class NetBill360ServiceProvider extends ServiceProvider
{
    /**
     * Register bindings and config.
     */
    public function register(): void
    {
        // Merge default config
        $this->mergeConfigFrom(
            __DIR__ . '/config/netbill360.php', 'netbill360'
        );
    }

    /**
     * Boot package resources.
     */
    public function boot(): void
    {
        // Allow publishing config
        $this->publishes([
            __DIR__ . '/config/netbill360.php' => config_path('netbill360.php'),
        ], 'config');
    }
}
