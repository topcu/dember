<?php namespace Topcu\Dumber;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\Repository;
use Illuminate\Support\Facades\Cache;

class DumberServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

    public function boot()
    {
        $this->package('topcu/dumber');
        Cache::extend('dumber', function($app)
        {
            $prefix = $app['config']->get('cache.prefix');
            $store = new DumberCacheStore($prefix);
            return new Repository($store);
        });
    }
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
