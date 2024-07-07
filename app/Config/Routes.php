<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->group('api/v1', function ($routes) {
    $routes->group('user', ['namespace' => 'App\Controllers\Api'], function ($routes) {
        $routes->get('(:any)', 'UserController::getById/$1');
        $routes->post('', 'UserController::add');
        $routes->get('', 'UserController::list');
    });
    $routes->group('auth', ['namespace' => 'App\Controllers\Api'], function ($routes) {
        $routes->post('sign-up', 'AuthenticationController::signUp');
        $routes->post('sign-in', 'AuthenticationController::signIn');
    });
});
