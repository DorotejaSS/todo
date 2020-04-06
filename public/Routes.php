<?php

                // route,           controller      method
Router::setRoute('login', 'Login', 'displayLogin');
Router::setRoute('registration', 'Registration', 'displayRegister');
Router::setRoute('dashboard', 'TaskController', 'display');
Router::setRoute('dashboard-update', 'TaskController', 'update');
Router::setRoute('logout', 'Login', 'logout');
