<?php

include 'Request.php';

class Router
{
    public $request;
    public static $valid_routes = [];

    public function __construct()
    {
        $this->request = new Request();
    }
    public static function set($route, $function)
    {
        self::$valid_routes[] = $route;

        if ($_GET['url'] == $route) {
            $function->__invoke();
        }
    }
}
