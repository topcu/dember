<?php namespace Topcu\Dumber;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;

class DumberServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $config_path = __DIR__.'/../config/config.php';

        if ($this->app->runningInConsole()) {
            $this->publishes([
                $config_path => config_path('dumber.php'),
            ], 'dumber');
        }

        $this->mergeConfigFrom($config_path, 'dumber');

        Cache::extend('dumber', function($app)
        {
            $store = app(DumberCacheStore::class);
            return Cache::repository($store);
        });
    }

	public function register()
	{
		//
	}
}
