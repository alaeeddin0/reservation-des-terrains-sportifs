<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UtilisateurModel;

class JoueurHomeController extends BaseController
{
    public function index()
    {
        // Supposons que les informations utilisateur sont stockées dans la session
        $session = session();
        $user = $session->get('user');

        // Vérifiez si l'utilisateur est connecté
        if (!$user) {
            return redirect()->to('/')->with('error', 'Veuillez vous connecter.');
        }

        // Récupérez le nom du joueur depuis la base de données (si nécessaire)
        $utilisateurModel = new UtilisateurModel();
        $utilisateur = $utilisateurModel->find($user['id']);

        if (!$utilisateur) {
            return redirect()->to('/')->with('error', 'Utilisateur introuvable.');
        }

        // Passez les données à la vue
        return view('joueur/JoueurHome', [
            'nom' => $utilisateur['nom'],
            'dateActuelle' => date('D, d M Y'), // Format de la date actuelle
        ]);
    }
}
