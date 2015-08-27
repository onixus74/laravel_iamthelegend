<?php namespace Minedun\LolApi;


use Illuminate\Support\Facades\Facade;

class LolApi extends Facade {

    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'lolapi';
    }

}