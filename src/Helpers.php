<?php

use \Webcp\LaravelSiteSettings\LaravelSiteSettings;

if (! function_exists('get_option'))
{
    /**
     * Get value of option name
     *
     * @param  string $option_name
     * @return mixed
     */
    function get_option(string $option_name)
    {
        return LaravelSiteSettings::get($option_name);
    }
}
