<?php

namespace Savvyosive\HandlerGenerator;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Savvyosive\HandlerGenerator\HandlerGenerator
 */
class HandlerGeneratorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-handler-generator';
    }
}
