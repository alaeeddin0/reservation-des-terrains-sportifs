<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');// Affiche le formulaire de login
$routes->get('/joueur/JoueurHome', 'JoueurHomeController::index');//affiche la page d'acceuil de joueur
$routes->get('/register', 'RegisterController::index');// affiche page de registre
$routes->post('/register/store', 'RegisterController::store');
$routes->post('/login', 'LoginController::login'); // Vérifie les identifiants
$routes->get('/recuperer_page', 'MotDePasseOublieController::index'); // Affiche la page de récupération
$routes->post('/recuperer', 'MotDePasseOublieController::envoyerEmail'); // Envoie l'e-mail
$routes->get('/mot_de_passe_oublie/reset/(:segment)', 'MotDePasseOublieController::reset/$1'); // Page de réinitialisation avec le token
$routes->post('/mettre_a_jour_mot_de_passe', 'MotDePasseOublieController::mettreAJourMotDePasse'); // Soumission du nouveau mot de passe
$routes->get('/logout', 'LoginController::logout');// Déconnecte l'utilisateur
$routes->get('/Reservation', 'ReservationController::index');//affiche page Reservation
$routes->get('/Avis', 'AvisController::index');//affiche page Avis
$routes->get('/Terrains', 'TerrainsController::index');//affiche page Terrains
$routes->get('/Profile', 'ProfileController::index');//affiche page Profile
$routes->post('/avis/store', 'AvisController::store');
$routes->get('/avis/edit/(:num)', 'AvisController::edit/$1');
$routes->post('/avis/update/(:num)', 'AvisController::update/$1');
$routes->post('/avis/delete/(:num)', 'AvisController::delete/$1');
$routes->post('/Reservation/create', 'ReservationController::create');
$routes->get('/reservation/edit/(:num)', 'ReservationController::edit/$1');
$routes->post('/reservation/update/(:num)', 'ReservationController::update/$1');
$routes->post('/reservation/delete/(:num)', 'ReservationController::delete/$1');
$routes->get('/Home', 'Home::index');
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



