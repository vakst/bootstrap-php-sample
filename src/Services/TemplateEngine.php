<?php

namespace Services;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TemplateEngine
{
    protected static $templateEngine = null;

    /**
     * @return Twig\Environment
     */
    public static function get()
    {
        if (empty(self::$templateEngine)) {
            $loader = new FilesystemLoader(__DIR__ . '/../Resources/views');
            self::$templateEngine = new Environment($loader, array(
                'cache' => __DIR__ . '/../../var/cache/',
                'debug' => false
            ));
        }

        return self::$templateEngine;
    }

    private function __construct() {}
    private function __clone() {}
}