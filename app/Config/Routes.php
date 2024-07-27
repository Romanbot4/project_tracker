<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Home
$routes->get('/', 'HomeViewController::index');
$routes->get('/reports', 'HomeViewController::reports');
$routes->get('/about', 'HomeViewController::about');

//Auth
$routes->get('/login', 'AuthViewController::login');
$routes->post('/login', 'AuthViewController::loginRequest');
$routes->get('/sign-up', 'AuthViewController::signUp');
$routes->post('/sign-up', 'AuthViewController::signUpRequest');

//Project
$routes->get('/projects', 'ProjectViewController::projects');
$routes->get('/create-project', 'ProjectViewController::createProject');
$routes->post('/create-project', 'ProjectViewController::createProjectRequest');
$routes->post('/delete-projects-by-ids', 'ProjectViewController::removeByIdsRequest');


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
    $routes->group('division', ['namespace' => 'App\Controllers\Api'], function ($routes) {
        $routes->post('', 'DivisionController::create');
        $routes->get('', 'DivisionController::list');
        $routes->get('(:any)', 'DivisionController::select/$1');
        $routes->put('(:any)', 'DivisionController::replace/$1');
        $routes->delete('(:any)', 'DivisionController::remove/$1');
    });
    $routes->group('feature', ['namespace' => 'App\Controllers\Api'], function ($routes) {
        $routes->post('', 'FeatureController::create');
        $routes->get('', 'FeatureController::list');
        $routes->get('(:any)', 'FeatureController::select/$1');
        $routes->put('(:any)', 'FeatureController::replace/$1');
        $routes->delete('(:any)', 'FeatureController::remove/$1');
    });

    $routes->group('project-features', ['namespace' => 'App\Controllers\Api'], function ($routes) {
        $routes->get('(:any)', 'FeatureController::listByProject/$1');
    });
    $routes->group('search', ['namespace' => 'App\Controllers\Api'], function ($routes) {
        $routes->get('email', 'SearchController::searchUserByEmail');
    });
});
