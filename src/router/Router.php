<?php

namespace Router;

use App\Controllers\Error,
    App\Controllers\ErrorController;

class Router
{
    private $url;
    public static $routes = [];

    public function __construct($url)
    {
        $this->url = trim($url, '/');
    }

    public function get(string $path, string $action): Route
    {
        return self::$routes['GET'][] = new Route($path, $action);
    }

    public function post(string $path, string $action): Route
    {
        return self::$routes['POST'][] = new Route($path, $action);
    }

    public static function route(string $name)
    {
        return '/' . self::$routes['GET'][$name]->path;
    }

    public static function redirect($route)
    {
        header('Location: ' . self::route($route));
        exit();
    }

    public function run()
    {
        foreach (self::$routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
                return $route->execute();
            }
        }

        (new ErrorController)->index(Error::NOT_FOUND);
    }
}
