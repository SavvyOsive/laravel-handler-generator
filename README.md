# This is my package HandlerGenerator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/savvyosive/laravel-handler-generator.svg?style=flat-square)](https://packagist.org/packages/savvyosive/laravel-handler-generator)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/savvyosive/laravel-handler-generator/run-tests?label=tests)](https://github.com/savvyosive/laravel-handler-generator/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/savvyosive/laravel-handler-generator/Check%20&%20fix%20styling?label=code%20style)](https://github.com/savvyosive/laravel-handler-generator/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/savvyosive/laravel-handler-generator.svg?style=flat-square)](https://packagist.org/packages/savvyosive/laravel-handler-generator)


## Installation

You can install the package via composer:

```bash
composer require savvyosive/laravel-handler-generator
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Savvyosive\HandlerGenerator\HandlerGeneratorServiceProvider" --tag="laravel-handler-generator-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Savvyosive\HandlerGenerator\HandlerGeneratorServiceProvider" --tag="laravel-handler-generator-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
use Savvyosive\HandlerGenerator\HandlerGenerator;

$handlerGenerator = new HandlerGenerator();

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [SavvyOsive](https://github.com/SavvyOsive)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
