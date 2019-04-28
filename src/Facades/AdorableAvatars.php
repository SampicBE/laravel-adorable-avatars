<?php

namespace Sampic\LaravelAdorableAvatars\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class AdorableAvatars
 * @package Sampic\LaravelAdorableAvatars\Facades
 */
class AdorableAvatars extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'AdorableAvatars';
    }
}
