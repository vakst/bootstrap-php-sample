<?php

namespace Services;

use Symfony\Component\Yaml\Parser;

/**
 * Very simple configuration storage
 */
class Config
{
    protected static $instance = null;
    protected $config = null;

    protected function __construct()
    {
        $this->config = (new Parser())->parse(file_get_contents(__DIR__ . '/../Resources/config.yml'));
    }

    /**
     * Get instance
     * @return Config
     */
    public static function get()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Get section by name
     * @param name $name
     * @return array
     */
    public function getSection($name)
    {
        return array_key_exists($name, $this->config) ? $this->config[$name] : null;
    }

    protected function __clone() {}
}