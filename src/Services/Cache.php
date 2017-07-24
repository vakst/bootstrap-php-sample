<?php

namespace Services;

use Memcached;

class Cache
{
    protected static $cacheService = null;

    /**
     * @return Memcached
     */
    public static function get()
    {
        if (empty(self::$cacheService)) {
            self::$cacheService = new Memcached();
            self::$cacheService->addServer(Config::get()->getSection('memcache')["host"],
                Config::get()->getSection('memcache')["port"]);
        }

        return self::$cacheService;
    }

    private function __construct() {}
    private function __clone() {}
}