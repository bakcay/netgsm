<?php

namespace Bakcay\NetGsm\Facades;

use Illuminate\Support\Facades\Facade;

class NetGsm extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'netgsm';
    }
}
