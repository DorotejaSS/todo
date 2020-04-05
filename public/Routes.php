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
    $dashboard->displayList();
});

$router->set('dashboard-update', function () {
    $dashboard = new Dashboard();
    $dashboard->update();
});

$router->set('logout', function () {
    session_destroy();
    Login::logout();
    Login::loadView('logout');
});
