<?php

use CodeIgniter\Router\RouteCollection;
use CodeIgniter\Controller\Homee;
use CodeIgniter\Controller\Utilisateur;
use CodeIgniter\Controller\Reservations;



/**
 * @var RouteCollection $routes
 */

$routes->get('/Home', 'Home::index');

$routes->get('/Profile', 'profileController::index');

$routes->get('/Utilisateurs_liste', 'UtilisateurController::index');
$routes->post('/Utilisateurs_liste/delete/(:num)', 'UtilisateurController::delete/$1');
$routes->post('/Utilisateurs_liste/update/(:num)', 'UtilisateurController::update/$1');

$routes->get('Reservations', 'ReservationsController::index');
$routes->post('/Reservations/updateStatut/(:num)', 'ReservationsController::updateStatut/$1');






$routes->get('/Terrain', 'TerrainController::index'); 
$routes->post('/Terrain/delete/(:num)', 'TerrainController::delete/$1'); 
$routes->post('/Terrain/update/(:num)', 'TerrainController::update/$1'); 


$routes->get('/add-terrains', 'TerrainController::create'); 
$routes->post('/add-terrains', 'TerrainController::save'); 



