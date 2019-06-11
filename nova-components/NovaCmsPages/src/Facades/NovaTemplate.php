<?php

namespace Yaroslawww\NovaCmsPages\Facades;


use Illuminate\Support\Facades\Facade;

class NovaTemplate extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'NovaCmsPages\NovaTemplate';
    }
}