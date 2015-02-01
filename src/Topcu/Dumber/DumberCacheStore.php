<?php

namespace Topcu\Dumber;

use Illuminate\Cache\StoreInterface;
use Illuminate\Support\Facades\Log;

class DumberCacheStore implements StoreInterface{

    /**
     * A string that should be prepended to keys.
     *
     * @var string
     */
    protected $prefix;

    /**
     * @var array driver configuration
     */
    protected $log_enabled;

    /**
     * Create a new Dummy cache store.
     *
     * @param  string  $prefix
     * @return void
     */
    public function __construct($prefix = '')
    {
        $this->prefix = $prefix;
        if ( \Config::get('dumber.log_enabled') !== null ) {
            $this->log_enabled = \Config::get("dumber.log_enabled", false );
        } else {
            $this->log_enabled = \Config::get("dumber::log_enabled", false );
        }
    }

    /**
     * Retrieve an item from the cache by key.
     *
     * @param  string  $key
     * @return mixed
     */
    public function get($key)
    {
        if($this->log_enabled){ Log::notice("Dumber:get: $key"); }
        return null;    // never retrieve an item
    }

    /**
     * Store an item in the cache for a given number of minutes.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @param  int     $minutes
     * @return void
     */
    public function put($key, $value, $minutes)
    {
        if($this->log_enabled){ Log::notice("Dumber:put: $key, duration: $minutes", ["value" => $value]); }
        // do nothing
    }

    /**
     * Increment the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     *
     * @throws \LogicException
     */
    public function increment($key, $value = 1)
    {
        if($this->log_enabled){ Log::notice("Dumber:increment: $key", ["value" => $value]); }
        // do nothing
    }

    /**
     * Increment the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     *
     * @throws \LogicException
     */
    public function decrement($key, $value = 1)
    {
        if($this->log_enabled){ Log::notice("Dumber:decrement: $key", ["value" => $value]); }
        // do nothing
    }

    /**
     * Store an item in the cache indefinitely.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function forever($key, $value)
    {
        if($this->log_enabled){ Log::notice("Dumber:forever: $key", ["value" => $value]); }
        // do nothing
    }

    /**
     * Remove an item from the cache.
     *
     * @param  string  $key
     * @return void
     */
    public function forget($key)
    {
        if($this->log_enabled){ Log::notice("Dumber:forget: $key"); }
        // do nothing
    }

    /**
     * Remove all items from the cache.
     *
     * @return void
     */
    public function flush()
    {
        if($this->log_enabled){ Log::notice("Dumber:flush"); }
        // do nothing
    }

    /**
     * Get the cache key prefix.
     *
     * @return string
     */
    public function getPrefix()
    {
        if($this->log_enabled){ Log::forget("Dumber:getPrefix"); }
        return $this->prefix;
    }
}