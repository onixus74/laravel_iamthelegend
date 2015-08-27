<?php namespace Minedun\LolApi;

use Illuminate\Support\ServiceProvider;

class LolApiServiceProvider extends ServiceProvider
{


    
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('LolApi', function($app) {
            return new LolApi();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/lolapi.php' => config_path('lolapi.php'),
        ]);
    }

}