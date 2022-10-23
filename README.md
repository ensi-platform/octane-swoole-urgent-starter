# Laravel Octane dev server starter

With this package your swoole dev server continue work even if you change code with syntax error.
Original server stops in this case.

## Installation

Install package
```
composer install ensi/laravel-octane-starter
```
and add this section to **config/octane.php** file
```
'swoole' => [
    'command' => '/var/www/vendor/bin/swoole-server-dev'
]
```

## Usage

Just start octane server with swoole backend and --watch option, 
and see how it reloads after very fatal errors.