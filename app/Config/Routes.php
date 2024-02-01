<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'LoginController::index');
$routes->post('/signin', 'LoginController::loginAuth');
$routes->get('/accueil', 'PlanningController::index');
$routes->post('/accueil/filter', 'PlanningController::filter');

$routes->get('/rattrapage', 'RattrapageController::index');
$routes->post('/rattrapage/traitement', 'RattrapageController::traitement');

$routes->get('/motDePasseOublie/(:any)', 'LoginController::motDePasseOublie/$1');
