<?php

namespace SimpleAPISecurity\Laravel\Providers;

use Illuminate\Support\ServiceProvider;
use SimpleAPISecurity\Laravel\SodiumEncrypter;

class EncryptionProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('encrypter', function ($app) {
            $config = $app->make('config')->get('app');
            $key = $config['key'];

            return new SodiumEncrypter($key);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['encrypter'];
    }
}
