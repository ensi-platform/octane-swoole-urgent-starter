# Alternative Laravel Octane swoole server starter

With this package your swoole server continue work even if you change code with syntax error.
Original server stops in this case.

## Installation

Install package
```
composer install ensi/laravel-octane-starter
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