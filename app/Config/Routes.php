<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'LoginController::index');
$routes->post('/signin', 'LoginController::loginAuth');
$routes->get('/accueil', 'PlanningController::index');
$routes->get('/rattrapage', 'RattrapageController::index');
$routes->get('/saisieabsents', 'SaisieAbsentsController::index');
$routes->post('/saisieabsents/traitement', 'SaisieAbsentsController::traitement');