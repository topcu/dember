## Dumber Laravel Dummy Cache Driver

Another Dummy Cache driver, that can be used in development environmet.
It can log every call made to the driver.

##### Installation

Recommended installation is trough *composer*, add to your `composer.json`:

```json

"require": {
	"topcu/dumber": "dev-master"
}

```

Add service provider to your `app/config/app.php` file:

```php

# ...

'providers' => array(
    # ...
    'Topcu\Dumber\DumberServiceProvider',
),

# ...
```


If you wish to enable logging,
you can add `app/config/dumber.php`

```php
<?php
return array(
    "log_enabled" => true,
);

```

Or just Publish package configuration:

```sh

php artisan config:publish topcu/dumber

```


##### Usage

**In your cache.php config file change driver to dumber**

```php
# ...
//'driver' => 'file',
'driver' => 'dumber',

# ...

```
