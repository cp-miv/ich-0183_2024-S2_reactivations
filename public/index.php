<?php

declare(strict_types=1);

/**
 * Composer
 */
require_once(dirname(__DIR__) . '/vendor/autoload.php');

$router = new Core\Router();
$router->dispatch($_SERVER['REQUEST_URI']);
