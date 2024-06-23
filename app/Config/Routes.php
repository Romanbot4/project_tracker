<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->group('api/v1', function ($routes) {
    $routes->group('project', ['namespace' => 'App\Controllers\Api'], function ($routes) {
        $routes->get('(:any)', 'UserController::getById/$1');
    });
});
    // $routes->group('projects', [
