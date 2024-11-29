<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UtilisateurModel;
use App\Models\TerrainsModel;
use App\Models\ReservationsModel;
use App\Models\CommentaireModel;

class JoueurHomeController extends BaseController
{
    public function index()
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
        $terrainsModel = new TerrainsModel();
        $reservationsModel = new ReservationsModel();
        $avisModel = new CommentaireModel();
        $terrains = $terrainsModel->countAllResults();
        $reservations = $reservationsModel->countAllResults();
        $avis = $avisModel->countAllResults();

        return view('joueur/JoueurHome', [
            'nom' => $utilisateur['nom'],
            'dateActuelle' => date('D, d M Y'),
            'terrains' => $terrains,
            'reservations' => $reservations,
            'avis' => $avis,
        ]);
    }
}
