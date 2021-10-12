<?php

namespace Router;

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

    public static function redirect($path)
    {
        header('Location: ' . $path);
        exit();
    }

    public function run()
    {
        foreach (self::$routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
                return $route->execute();
            }
        }

        require VIEW_ROOT . 'errors/404.php';
    }
}
