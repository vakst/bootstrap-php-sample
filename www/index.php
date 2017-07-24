<?php
require_once __DIR__ . '/../vendor/autoload.php';

use ErrorHandler\ErrorHandler;
use Router\Router;


date_default_timezone_set('America/New_York');

$errorHandler = new ErrorHandler;
$errorHandler->register();
Router::handle();