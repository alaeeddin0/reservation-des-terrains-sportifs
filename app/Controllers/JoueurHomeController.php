<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class JoueurHomeController extends BaseController
{
    public function index()
    {
        // Vérifiez si l'utilisateur est connecté
        if (!session()->get('user') || session()->get('user')['role'] !== 'joueur') {
            return redirect()->to('/')->with('error', 'Accès refusé.');
        }

        // Chargez la vue du tableau de bord joueur
        return view('joueur/JoueurHome');
    }

}
