<?php

declare(strict_types=1);

namespace Core;

abstract class Controller
{
    protected $routeParams = [];
    protected $view = [];

    public function __construct(array $routeParams)
    {
        $this->routeParams = $routeParams;
    }

    public function invoke(string $methodName): void
    {
        $this->before();

        $this->$methodName();

        $this->after();
    }

    protected function before() {}

    protected function after() {}
}
