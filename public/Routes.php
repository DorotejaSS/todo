<?php

$request = new Request();

Router::set('login', function () use ($request) {
    new Login($request);
    Login::loadView('login');
});

Router::set('registration', function () use ($request) {
    new Registration($request);
    Registration::loadView('registration');
});

Router::set('dashboard', function () use ($request) {
    $dashboard = new Dashboard($request);
    $dashboard->displayList();
});

Router::set('dashboard-update', function () use ($request) {
    $dashboard = new Dashboard($request);
    $dashboard->update();
});

Router::set('logout', function () use ($request) {
    Login::loadView('logout');
    Login::logout();
    session_destroy();
});
