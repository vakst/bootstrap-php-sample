<?php

namespace Router;

class Router
{
    public static function handle()
    {
        if (preg_match('/\/p\/(\d+)[\/]{0,1}/', $_SERVER['REQUEST_URI'], $matches)) {
            $controller = new \Controller\StarShipController();
            $controller->listAction($matches[1]);

        } elseif ($_SERVER['REQUEST_URI'] == '/') {
            $controller = new \Controller\StarShipController();
            $controller->listAction(null);
        } else {
            header('HTTP/1.0 404 Not Found');
        }
    }
}