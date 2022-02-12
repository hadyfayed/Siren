<?php

namespace HadyFayed\Siren\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \HadyFayed\Siren\Siren
 */
class Siren extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'siren';
    }
}
