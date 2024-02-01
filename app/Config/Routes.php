<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'LoginController::index');
$routes->post('/signin', 'LoginController::loginAuth');
$routes->get('/accueil', 'PlanningController::index');
$routes->post('/accueil/filter', 'PlanningController::filter');
$routes->post('/accueil/edit/(:segment)', 'PlanningController::edit/$1');

$routes->get('/rattrapage', 'RattrapageController::index');
$routes->post('/rattrapage/traitement', 'RattrapageController::traitement');