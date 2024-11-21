<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');// Affiche le formulaire de login
$routes->get('/joueur/JoueurHome', 'JoueurHomeController::index');
$routes->post('/login', 'LoginController::login'); // Vérifie les identifiants
$routes->get('/logout', 'LoginController::logout');// Déconnecte l'utilisateur

