<?php

session_start();
include_once('routes.php');

function __autoload($class_name) {
    if (file_exists('../app/classes/'.$class_name.'.php')) {
        require_once '../app/classes/'.$class_name.'.php';
    } elseif (file_exists('../app/controllers/'.$class_name.'.php')) {
        require_once '../app/controllers/'.$class_name.'.php';
    } elseif (file_exists('../app/models/'.$class_name.'.php')) {
        require_once '../app/models/'.$class_name.'.php';
    }
}



