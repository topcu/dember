<?php namespace Topcu\Dumber;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;

class DumberServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $config_path = __DIR__.'../config/config.php';
        $this->publishes([
            $config_path => config_path('dumber.php'),
        ]);
        $this->mergeConfigFrom($config_path, 'dumber');

        Cache::extend('dumber', function($app)
        {
            $prefix = $app['config']->get('cache.prefix');
            $store = new DumberCacheStore($prefix);
            return Cache::repository($store);
        });
    }

	public function register()
	{
		//
	}
}
