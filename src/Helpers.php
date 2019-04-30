<?php

use Webcp\LaravelSiteSettings\Setting;

if (! function_exists('get_option'))
{
    /**
     * Get option's value
     *
     * @param string $option_name
     * @return mixed
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    function get_option(string $option_name)
    {
        return Setting::get($option_name);
    }
}

if (! function_exists('update_option'))
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
    function update_option(array $data)
    {
        return Setting::updateSettings($data);
    }
}
