<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');// Affiche le formulaire de login
$routes->get('/joueur/JoueurHome', 'JoueurHomeController::index');//affiche la page d'acceuil de joueur
$routes->get('/register','RegisterController::index');// affiche page de registre
$routes->post('/register/store','RegisterController::store');
$routes->post('/login', 'LoginController::login'); // Vérifie les identifiants
$routes->get('/recuperer_page', 'MotDePasseOublieController::index'); // Affiche la page de récupération
$routes->post('/recuperer', 'MotDePasseOublieController::envoyerEmail'); // Envoie l'e-mail
$routes->get('/mot_de_passe_oublie/reset/(:segment)', 'MotDePasseOublieController::reset/$1'); // Page de réinitialisation avec le token
$routes->post('/mettre_a_jour_mot_de_passe', 'MotDePasseOublieController::mettreAJourMotDePasse'); // Soumission du nouveau mot de passe
$routes->get('/logout', 'LoginController::logout');// Déconnecte l'utilisateur

