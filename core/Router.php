<?php

declare(strict_types=1);

namespace Core;

class Router
{
    public function dispatch(string $uri): void
    {
        $uri = $this->removeQueryStringVariables($uri);
        $routeComponents = $this->parseUri($uri);

        $className = $routeComponents['Controller'];
        $methodName = $routeComponents['Action'];

        $className = ucfirst($className);
        $className = "App\\Controllers\\{$className}Controller";


        $methodName = ucwords($methodName, '-');
        $methodName = str_replace('-', '', $methodName);
        $methodName = lcfirst($methodName);

        $controller = new $className($routeComponents);
        $controller->invoke($methodName);
    }

    protected function removeQueryStringVariables(string $uri): string
    {
        $uri = parse_url($uri, PHP_URL_PATH);

        return $uri;
    }

    protected function parseUri(string $uri): array
    {
        $re = '/^\/(?<Controller>[a-z-]+)\/(?<Action>[a-z-]+)/mi';

        preg_match($re, $uri, $matches);

        return $matches;
    }
}
