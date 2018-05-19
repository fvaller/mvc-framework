<?php

namespace SON\Init;

abstract class Bootstrap
{
    private $routes;

    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    //rotas
    abstract protected function initRoutes();

    public function run($url)
    {
        array_walk($this->routes, function ($route) use ($url) {
            if ($url == $route['route']) {
                $class = "App\\Controllers\\" . $route['controller'];
                $controller = new $class;
                $action = $route['action'];
                $controller->$action();
            }
        }
        );
    }

    public function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    public function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

}