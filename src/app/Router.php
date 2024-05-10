<?php

declare(strict_types=1);
namespace App;

use App\Exceptions\RouteNotFoundException;

class Router
{
    private array $routes = [];

    public function register(string $requestMethod, string $route, callable|array $action): self
    {
        $this->routes[$requestMethod][$route] = $action;

        return $this;
    }

    public function resolve(string $requestUri, string $requestMethod)
    {
        $route  = explode('?', $requestUri)[0];
        $action = $this->routes[$requestMethod][$route] ?? null;

//        echo '<pre>';
//        var_dump($this->routes[$requestMethod], $route);
//        echo '</pre>';

        if (!$action) {
            throw new RouteNotFoundException();
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;

            if (class_exists($class)) {
                $class = new $class();

                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }

        throw new RouteNotFoundException();
    }

    public function routes(): array
    {
        return $this->routes;
    }

    public function get(string $route, callable|array $action): self
    {
        $this->register('GET', $route, $action);

        return $this;
    }

    public function post(string $route, callable|array $action): self
    {
        $this->register('POST', $route, $action);

        return $this;
    }
}