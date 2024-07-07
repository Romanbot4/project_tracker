<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->group('api/v1', function ($routes) {
    $routes->group('user', ['namespace' => 'App\Controllers\Api'], function ($routes) {
        $routes->get('(:any)', 'UserController::getById/$1');
        $routes->post('', 'UserController::create');
        $routes->get('', 'UserController::list');
    });
    $routes->group('auth', ['namespace' => 'App\Controllers\Api'], function ($routes) {
        $routes->post('sign-up', 'AuthenticationController::signUp');
        $routes->post('sign-in', 'AuthenticationController::signIn');
    });
    $routes->group('project', ['namespace' => 'App\Controllers\Api'], function ($routes) {
        $routes->post('', 'ProjectController::create');
        $routes->get('', 'ProjectController::list');
        $routes->get('(:any)', 'ProjectController::select/$1');
        $routes->put('(:any)', 'ProjectController::replace/$1');
        $routes->delete('(:any)', 'ProjectController::remove/$1');
    });
    $routes->group('search', ['namespace' => 'App\Controllers\Api'], function ($routes) {
        $routes->get('email', 'SearchController::searchUserByEmail');
    });
});
