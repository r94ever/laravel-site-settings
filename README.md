# Readme

[![Latest Version on Packagist](https://img.shields.io/packagist/v/webcp/laravel-site-settings.svg?style=flat-square)](https://packagist.org/packages/vandt147/laravel-site-settings)
[![Build Status](https://img.shields.io/travis/webcp/laravel-site-settings/master.svg?style=flat-square)](https://travis-ci.org/vandt147/laravel-site-settings)
[![Quality Score](https://img.shields.io/scrutinizer/g/webcp/laravel-site-settings.svg?style=flat-square)](https://scrutinizer-ci.com/g/vandt147/laravel-site-settings)
[![Total Downloads](https://img.shields.io/packagist/dt/webcp/laravel-site-settings.svg?style=flat-square)](https://packagist.org/packages/vandt147/laravel-site-settings)

Application settings for your Laravel site
## Installation

You can install the package via composer:

```bash
composer require webcp/laravel-site-settings
```

## Usage

Add class LaravelSiteSettingsServiceProvider to config/app.php

```php
Webcp\LaravelSiteSettings\LaravelSiteSettingsServiceProvider::class,
```

If you want to change to config data, you can publish the config file with:

```php
php artisan vendor:publish --provider="Webcp\LaravelSiteSettings\LaravelSiteSettingsServiceProvider" --tag=config
```

Then change the desired name for settings table if you want.

Publishing the migration with:

``` php
php artisan vendor:publish --provider="Webcp\LaravelSiteSettings\LaravelSiteSettingsServiceProvider" --tag=migrations
```

After the migration has been published, you run this command:

```php
php artisan migrate
```

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
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).