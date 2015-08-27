<?php

namespace Minedun\Teamwork;

use Minedun\ServiceProvider\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    protected $packageName = 'teamwork';

    public function boot()
    {
        $this->setup(__DIR__)
             ->publishMigrations();
    }
}
