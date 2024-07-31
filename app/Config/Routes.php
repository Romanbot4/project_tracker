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
$routes->get('/logout', 'AuthViewController::logOutRequest');

//Project
$routes->get('/projects', 'ProjectViewController::projects');
$routes->get('/create-project', 'ProjectViewController::createProject');
$routes->post('/create-project', 'ProjectViewController::createProjectRequest');
$routes->post('/delete-projects-by-ids', 'ProjectViewController::removeByIdsRequest');


//Teams
$routes->get('/teams', 'TeamViewController::teams');
$routes->get('/teams-cards', 'TeamViewController::teamCards');
$routes->post('/create-team', 'TeamViewController::createTeamRequest');
$routes->get('/create-team', 'TeamViewController::createTeam');
$routes->get('/delete-team/(:num)', 'TeamViewController::deleteById/$1');


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

    $routes->group('teams', ['namespace' => 'App\Controllers\Api'], function ($routes) {
        $routes->get('(:any)', 'TeamController::select/$1');
        $routes->post('add-user', 'TeamController::addUserToTeam');
        $routes->post('remove-user', 'TeamController::removeUserFromTeam');

        $routes->post('', 'TeamController::create');
        $routes->get('', 'TeamController::list');
        $routes->get('(:any)', 'TeamController::select/$1');
        $routes->put('(:any)', 'TeamController::replace/$1');
        $routes->delete('(:any)', 'TeamController::remove/$1');
    });

    $routes->group('project-features', ['namespace' => 'App\Controllers\Api'], function ($routes) {
        $routes->get('(:any)', 'FeatureController::listByProject/$1');
    });

    $routes->group('search', ['namespace' => 'App\Controllers\Api'], function ($routes) {
        $routes->get('email', 'SearchController::searchUserByEmail');
    });
});
