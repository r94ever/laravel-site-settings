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

if (! function_exists('update_settings'))
{
    /**
     * Update Settings
     *
     * @since 1.0.1
     *
     * @param array $data
     * @return bool
     * @throws Exception
     */
    function update_settings(array $data)
    {
        return LaravelSiteSettings::updateSettings($data);
    }
}
