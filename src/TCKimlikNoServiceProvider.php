<?php

namespace Bakcay\NetGsm;

use Illuminate\Support\ServiceProvider;

class NetGsmServiceProvider extends ServiceProvider {
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot() {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole() {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/netgsm.php' => config_path('netgsm.php'),
        ], 'netgsm.config');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register() {
        $this->mergeConfigFrom(__DIR__ . '/../config/netgsm.php', 'netgsm');

        // Register the service the package provides.
        $this->app->singleton('netgsm', function ($app) {
            return new NetGsm;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return ['netgsm'];
    }
}
