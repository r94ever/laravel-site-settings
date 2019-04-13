<?php

namespace Webcp\LaravelSiteSettings;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Webcp\LaravelSiteSettings\Skeleton\SkeletonClass
 */
class LaravelSiteSettingsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-site-settings';
    }
}
