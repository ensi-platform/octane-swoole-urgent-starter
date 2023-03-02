# Alternative Laravel Octane swoole server starter

With this package your swoole server continue work even if you change code with syntax error.
Original server stops in this case.

## Installation

Install package
```
composer require ensi/octane-swoole-urgent-starter
```
and add this section to **config/octane.php** file
```
'swoole' => [
    'command' => '/var/www/vendor/bin/urgent-swoole-server',
    'show_fatal_error' => env('OCTANE_SHOW_FATAL_ERROR', false),
]
```

## Usage

Just start octane server with swoole backend and --watch option, 
and see how it reloads after very fatal errors.  
If you want to see error message in http response, set true to OCTANE_SHOW_FATAL_ERROR environment variable.

## When service works in ELC workspace

Old elc workspace template uses hack for reloading code without container restarts.  
You should to replace last artisan command in templates/swoole-X.X/php/entrypoint to this

```shell
OCTANE_SHOW_FATAL_ERROR=true php artisan octane:swoole --watch --host=0.0.0.0 --workers=1 --task-workers=1 || sleep 3600
```

## License

[Открытая лицензия на право использования программы для ЭВМ Greensight Ecom Platform (GEP)](LICENSE.md).
