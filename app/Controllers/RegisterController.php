<?php
namespace App\Controllers;

use App\Models\UtilisateurModel;
use App\Models\JoueurModel;

class RegisterController extends BaseController
{
    public function index(): string
    {
        return view('auth/register');
    }

    public function store()
    {
        // Validation des données de l'inscription
        $validation = \Config\Services::validation();

        // Règles de validation
        $validation->setRules([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[utilisateur.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ]);

        // Si la validation échoue, retourner les erreurs
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Créer l'utilisateur dans la table 'utilisateur'
        $utilisateurModel = new UtilisateurModel();
        $userData = [
            'nom' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'joueur', // L'utilisateur est un joueur
        ];

        // Insère l'utilisateur et récupère son ID
        $utilisateurId = $utilisateurModel->insert($userData);

        // Créer un joueur dans la table 'joueur'
        $joueurModel = new JoueurModel();
        $joueurData = [
            'id' => $utilisateurId,  // L'ID de l'utilisateur devient l'ID du joueur
            'nom' => $this->request->getPost('name'), 
            'email' => $this->request->getPost('email'),
            'historique_reservations' => '',  
        ];
        
        $joueurModel->insert($joueurData); // Insère le joueur

        // Redirige vers la page de connexion avec un message de succès
        return redirect()->to('/')->with('success', 'Inscription réussie. Vous pouvez maintenant vous connecter.');
    }
}
