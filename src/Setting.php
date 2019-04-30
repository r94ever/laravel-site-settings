<?php

namespace Webcp\LaravelSiteSettings;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;

/**
 * @method static where(string $string, string $option_name)
 */
class Setting extends Model
{
    /**
     * The cache key name which hold settings data
     *
     * @var string
     */
    const CACHE_KEY = 'laravel_site_settings';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'value'
    ];

    /**
     * Create a new Eloquent model instance.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('laravel-site-settings.table');
    }

    /**
     * This key will be used to store settings data in cache
     *
     * @return string
     */
    public static function cacheKey()
    {
        return sprintf("%s_%s", config('app.name'), static::CACHE_KEY);
    }

    /**
     * Get all settings value with autoload flag
     *
     * @return mixed
     */
    public static function autoload()
    {
        return self::where('autoload', '1')->get()->mapWithKeys(function($item) {
            return [$item['name'] => $item['value']];
        });
    }

    /**
     * Get the value of given key in setting data
     *
     * @param string $option_name
     * @return mixed
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public static function get(string $option_name)
    {
        $settings = cache()->get(static::cacheKey());

        // Check cache first
        if ($settings instanceof Collection && $settings->has($option_name)) {
            return $settings->get($option_name);
        }

        // In case unavailable in cache, get from database
        return self::where('name', $option_name)->pluck('value', 'name')->first();
    }

    /**
     * Update new setting values to database
     *
     * @param array $data   Array contains key/value pairs
     * @throws QueryException  SQL error
     *
     * @return boolean
     */
    public static function updateSettings($data)
    {
        try {
            foreach ($data as $name => $value) {
                self::updateOrCreate(
                    ['name' => $name],
                    ['value' => $value]
                );
            }

        } catch (\Illuminate\Database\QueryException $e) {
            return systemErrorResponse($e);
        }

        // Forget stored cache
        Cache::forget(self::cacheKey());

        return;
    }
}
