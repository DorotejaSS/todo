<?php

include 'Request.php';

class Router
{
    public $request;
    public $valid_routes = [];

    public function __construct()
    {
        $this->request = new Request();
    }
    public function set($route, $function)
    {
        $this->$valid_routes[] = $route;

        if ($_GET['url'] == $route) {
            $function->__invoke($this->request);
        }
    }
}
