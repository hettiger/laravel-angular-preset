<?php

namespace Hettiger\LaravelAngularPreset\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Hettiger\LaravelAngularPreset\LaravelAngularPreset
 */
class LaravelAngularPreset extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Hettiger\LaravelAngularPreset\LaravelAngularPreset::class;
    }
}
