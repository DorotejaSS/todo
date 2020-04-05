<?php

$router = new Router();

$router->set('login', function () {
    Login::loadView('login');
    new Login();
});

$router->set('registration', function () {
    Registration::loadView('registration');
    new Registration();
});

$router->set('dashboard', function () {
    $dashboard = new Dashboard();
    $dashboard->checkStatus();
});

$router->set('logout', function () {
    Login::loadView('logout');
    Login::logout();
    session_destroy();
});
