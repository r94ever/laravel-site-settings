# Laravel Site Settings

[![Latest Version on Packagist](https://img.shields.io/packagist/v/webcp/laravel-site-settings.svg?style=flat-square)](https://packagist.org/packages/vandt147/laravel-site-settings)

## Installation

### Download

You can install the package via composer:

```bash
composer require webcp/laravel-site-settings
```

### Publish config & migration files

**For Laravel 5.4 or below**: Add class LaravelSiteSettingsServiceProvider to config/app.php

```php
Webcp\LaravelSiteSettings\LaravelSiteSettingsServiceProvider::class,
```

If you want to change to config data, you can publish the config file with:

```php
php artisan vendor:publish --provider="Webcp\LaravelSiteSettings\LaravelSiteSettingsServiceProvider" --tag="config"
```

Then change the desired name for settings table if you want.

```php
return [
    'table' => 'settings'
];
```

Publishing the migration with:

``` php
php artisan vendor:publish --provider="Webcp\LaravelSiteSettings\LaravelSiteSettingsServiceProvider" --tag="migrations"
```

After the migration has been published, you run this command to start migration:

```php
php artisan migrate
```

## Usage

Create new option with autoload flag enabled

```bash
php artisan option:add option_name option_value
```

Create new option with autoload flag disabled

```bash
php artisan option:add option_name option_value -M
```

By default, all of your options with `autoload` flag = 1 will be loaded automatically from cache. You can get any option value without touching database

```php
$value = Setting::get('option_name');

// or
$value = get_option('option_name');
``` 

Update setting value. If setting key does not exist, it will be created:

```php
$options = [
    'option name' => 'option value',
    'foo' => 'bar'
];

Setting::updateOption($options);

// or
update_option($option);
```

All settings cache will be forgiven after update.

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email vandt147@outlook.com instead of using the issue tracker.

## Credits

- [Dương Thành Văn](https://github.com/r94ever)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.