<?php

namespace Riazxrazor\LaravelSweetAlert;


use Illuminate\Support\Facades\Facade;

class LaravelSweetAlertFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-sweet-alert';
    }

}