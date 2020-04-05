<?php

class Router
{
    public static $valid_routes = [];

    public static function set($route, $function)
    {
        self::$valid_routes[] = $route;

        if ($_GET['url'] == $route) {
            $function->__invoke();
        }
    }
}
