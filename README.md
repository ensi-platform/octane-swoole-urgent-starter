# Alternative Laravel Octane swoole server starter

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ensi/octane-swoole-urgent-starter.svg?style=flat-square)](https://packagist.org/packages/ensi/octane-swoole-urgent-starter)
[![Tests](https://github.com/ensi-platform/octane-swoole-urgent-starter/actions/workflows/run-tests.yml/badge.svg?branch=master)](https://github.com/ensi-platform/octane-swoole-urgent-starter/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/ensi/octane-swoole-urgent-starter.svg?style=flat-square)](https://packagist.org/packages/ensi/octane-swoole-urgent-starter)

This package adds alternative behaviour to octane server for dev and prod usage.  
**Dev:** server process continue work even if syntax error appears in code.  
**Prod:** you can start swoole master process directly, without artisan command, which consumes some memory.

## Installation

You can install the package via composer:

```bash
composer require ensi/octane-swoole-urgent-starter
```

and add this section to **config/octane.php** file
```
'swoole' => [
    'command' => '/var/www/vendor/bin/urgent-swoole-server',
    'show_fatal_error' => env('OCTANE_SHOW_FATAL_ERROR', false),
]
```

## Version Compatibility

| Laravel Octane swoole server starter | Laravel Octane    | PHP  |
|--------------------------------------|-------------------|------|
| ^0.1.0                               | ^1.2              | *    |
| ^2.0.0                               | ^2.0              | ^8.1 |

## Basic Usage

### Dev
Just start octane server with swoole backend and --watch option,
and see how it reloads after very fatal errors.  
If you want to see error message in http response, set `true` to `OCTANE_SHOW_FATAL_ERROR` environment variable.

### Prod
Originally, `octane:start` command makes server state file and then starts swoole process as child.  
Now you can to separate this to two steps.  
First: use `octane:dump-server-state` command for saving server state file.  
Second: start swoole process, without any useless parent.

```shell
php artisan octane:dump-server-state --host=0.0.0.0 --port=8000 --workers=20

export APP_ENV=production
export APP_BASE_PATH=/var/www
export LARAVEL_OCTANE=1

php ./vendor/bin/swoole-server /var/www/storage/logs/octane-server-state.json
```

## When service works in ELC workspace

Old elc workspace template uses hack for reloading code without container restarts.
You should to replace last artisan command in templates/swoole-X.X/php/entrypoint to this

```shell
OCTANE_SHOW_FATAL_ERROR=true php artisan octane:swoole --watch --host=0.0.0.0 --workers=1 --task-workers=1 || sleep 3600
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

### Testing

1. composer install
2. composer test

## Security Vulnerabilities

Please review [our security policy](.github/SECURITY.md) on how to report security vulnerabilities.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
