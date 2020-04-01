<?php

new Router();

Router::set('login', function () {
    Login::loadView('login');
    new Login();
});

Router::set('registration', function () {
    Registration::loadView('registration');
    new Registration();
});

Router::set('dashboard', function () {
    $dashboard = new Dashboard();
    $dashboard->checkStatus();
});

Router::set('logout', function () {
    Login::loadView('logout');
    Login::logout();
    session_destroy();
});
