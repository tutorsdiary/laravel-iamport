<?php

namespace Tuda\Iamport\Facades;

use Illuminate\Support\Facades\Facade;
use Tuda\Iamport\Iamport as IamportClass;

class Iamport extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return IamportClass::class;
    }
}