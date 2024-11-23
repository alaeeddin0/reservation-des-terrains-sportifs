<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UtilisateurModel;

class ProfileController extends BaseController
{
    public function index(): string
    {
        $session = session();
        $user = $session->get('user');
        if (!$user) {
            return redirect()->to('/')->with('error', 'Veuillez vous connecter.');
        }
        $utilisateurModel = new UtilisateurModel();
        $utilisateur = $utilisateurModel->find($user['id']);

        if (!$utilisateur) {
            return redirect()->to('/')->with('error', 'Utilisateur introuvable.');
        }

        return view('joueur/Profile', [
            'nom' => $utilisateur['nom'],
            'dateActuelle' => date('D, d M Y'), // Format de la date actuelle
        ]);
    }
}