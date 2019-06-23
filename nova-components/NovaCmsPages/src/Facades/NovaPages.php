<?php

namespace Yaroslawww\NovaCmsPages\Facades;

use Illuminate\Support\Facades\Facade;

class NovaPages extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'NovaCmsPages\NovaPages';
    }
}
