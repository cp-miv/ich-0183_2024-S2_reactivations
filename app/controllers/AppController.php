<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;

abstract class AppController extends Controller
{
    protected function before()
    {
        parent::before();

        $this->view['page'] = dirname(__DIR__) . "/views/{$this->routeParams['Controller']}/{$this->routeParams['Action']}.html";
    }

    protected function after()
    {
        parent::after();

        extract($this->view);
        require_once(dirname(__DIR__) . '/views/layout/base.html');
    }

    protected function redirect(string $location, int $code = 302): void
    {
        header("Location: {$location}", true, $code);
        exit();
    }
}
