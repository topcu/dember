# Dumber Laravel Dummy Cache Driver

Another Dummy Cache driver, which can log every call made to the driver if enabled by config.

## Installation
Via Composer
```sh
    $ composer require topcu/dumber`
```

Add the service provider to the providers array in `config/app.php`.

```php
    # ...
    'providers' => array(
        # ...
        'Topcu\Dumber\DumberServiceProvider',
    ),
    # ...
```


## Usage

In your `config/cache.php`  change add a store using dumber as driver.

```php
    # ...
    'stores' => [
    # ...
        'dumber' => [
            'driver' => 'dumber',
        ],
    # ...
```
And set your default store if needed.
```php
    'default' => 'dumber',
```

## Enabling Logging
If you wish to enable logging, you need do publish package config file and set `log_enabled` to `true`
```sh
    php artisan vendor:publish --provider="Topcu\Dumber\DumberServiceProvider"
```

`app/config/dumber.php` :
```php
    <?php
    return [
        "log_enabled" => true,
        "log_level" => "notice"
    ];
```

