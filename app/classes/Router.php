<?php

class Router
{
    public static $valid_routes = [];

    public function setRoute($route, $class_name, $method_name)
    {
        $request = new Request();

        self::$valid_routes[] = $route;

        if ($request->url[2] == $route) {
            $controller = new $class_name($request);
            $controller->$method_name();
        }
    }
}
