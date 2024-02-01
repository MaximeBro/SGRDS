<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'LoginController::index');
$routes->post('/signin', 'LoginController::loginAuth');
$routes->get('/accueil', 'PlanningController::index');
$routes->post('/accueil/filter', 'PlanningController::filter');
$routes->get('/accueil/edit/(:segment)', 'PlanningController::edit/$1');
$routes->get('/accueil/delete/(:segment)', 'PlanningController::delete/$1');

$routes->get('/rattrapage', 'RattrapageController::index');
$routes->post('/rattrapage/traitement', 'RattrapageController::traitement');

$routes->get('/motDePasseOublie/(:any)', 'LoginController::motDePasseOublie/$1');

$routes->get('/saisieabsents', 'AbsencesController::index');
$routes->get('/absences', 'AbsencesController::absences');
$routes->post('/saisieabsents/traitement', 'AbsencesController::traitement');

$routes->get('/session/destroy', 'MainController::disconnect');

$routes->get('/rattrapage/saisie/(:any)/(:any)/(:any)', 'RattrapageController::saisie/$1/$2/$3');
$routes->get('/etudiants', 'EtudiantController::index');
$routes->post('/importCsvToDb', 'EtudiantController::importCsvToDb');
