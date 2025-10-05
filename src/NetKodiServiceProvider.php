<?php

namespace NetKodi;

use Illuminate\Support\ServiceProvider;

class NetKodiServiceProvider extends ServiceProvider
{
    /**
     * Register bindings and config.
     */
    public function register(): void
    {
        // Merge default config
        $this->mergeConfigFrom(
            __DIR__ . '/config/netkodi.php', 'netkodi'
        );
    }

    /**
     * Boot package resources.
     */
    public function boot(): void
    {
        // Allow publishing config
        $this->publishes([
            __DIR__ . '/config/netkodi.php' => config_path('netkodi.php'),
        ], 'config');
    }
}
