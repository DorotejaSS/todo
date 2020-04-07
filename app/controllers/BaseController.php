<?php

class BaseController
{
    public static $view_data = [];

    public function __construct($req)
    {
        $this->req = $req;
    }

    public function loadView($view_name, $view_data = null)
    {
        self::$view_data = $view_data;

        require_once('../app/views/'.$view_name.'.php');
    }
}
