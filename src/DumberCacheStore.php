<?php

namespace Topcu\Dumber;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Cache\RetrievesMultipleKeys;

class DumberCacheStore implements Store
{
    use RetrievesMultipleKeys;

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
     * @var Log
     */
    private $logger;

    /**
     * Create a new Dummy cache store.
     *
     * @param  string  $prefix
     * @return void
     */
    public function __construct($prefix = '', Log $logger)
    {
        $this->prefix = $prefix;
        $this->logger = $logger;
        $this->log_enabled = config("dumber.log_enabled", false);
    }

    protected function log($method, $params = [])
    {
        if($this->log_enabled){
            $this->logger->notice("Dumber:$method :", $params);
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

        $this->log("get", ["key" => $key]);
        return null;
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
        $this->log("put", compact("key", "value", "minutes"));
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
        $this->log("increment", compact("key", "value"));
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
        $this->log("decrement", compact("key", "value"));
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
        $this->log("forever", compact("key", "value"));
    }

    /**
     * Remove an item from the cache.
     *
     * @param  string  $key
     * @return void
     */
    public function forget($key)
    {
        $this->log("forget", compact("key"));
    }

    /**
     * Remove all items from the cache.
     *
     * @return void
     */
    public function flush()
    {
        $this->log("flush");
    }

    /**
     * Get the cache key prefix.
     *
     * @return string
     */
    public function getPrefix()
    {
        $this->log("getPrefix");
        return $this->prefix;
    }
}