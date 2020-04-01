<?php

class Controller
{
    public static $view_data = [];

    public static function loadView($view_name, $view_data = null)
    {
        self::$view_data = $view_data;
        require_once('../app/views/'.$view_name.'.php');
    }
}
