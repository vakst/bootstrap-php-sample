<?php

namespace Logger;

use Monolog\Handler\StreamHandler;
use Monolog\Logger as MonologLogger;

class Logger
{
    protected static $logger;

    /**
     * @return MonologLogger
     */
    public static function get()
    {
        if (empty(self::$logger)) {
            self::$logger = new MonologLogger('logger');
            self::$logger->pushHandler(new StreamHandler(__DIR__ . '/../../var/log/log.log', MonologLogger::NOTICE));

        }

        return self::$logger;
    }

    private function __construct() {}
    private function __clone() {}
}