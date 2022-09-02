# Laravel Angular Frontend Preset

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hettiger/laravel-angular-preset.svg?style=flat-square)](https://packagist.org/packages/hettiger/laravel-angular-preset)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/hettiger/laravel-angular-preset/run-tests?label=tests)](https://github.com/hettiger/laravel-angular-preset/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/hettiger/laravel-angular-preset/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/hettiger/laravel-angular-preset/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/hettiger/laravel-angular-preset.svg?style=flat-square)](https://packagist.org/packages/hettiger/laravel-angular-preset)

Integrates Angular into a Laravel Application. Works on Laravel Vapor.

## Installation

You can install the package via composer:

```bash
composer require hettiger/laravel-angular-preset
```

## Usage

Execute the following commands:

```bash
php artisan laravel-angular-preset:install
npm run ng:dev
```

View your app in the web browser. Angular should be up and running at this point.
Your Angular app lives under `resources/angular`. Start adding components and enjoy.

See `package.json` for more scripts starting with the prefix `ng:`.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Martin Hettiger](https://github.com/hettiger)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
