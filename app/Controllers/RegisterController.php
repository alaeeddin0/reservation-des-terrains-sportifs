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
        $validation = \Config\Services::validation();

        // Set validation rules
        $validation->setRules([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[utilisateur.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ]);

        // Validate the form inputs
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Prepare user data
        $utilisateurModel = new UtilisateurModel();
        $userData = [
            'nom' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'joueur', 
        ];

        $utilisateurId = $utilisateurModel->insert($userData);

        if (!$utilisateurId) {
            return redirect()->back()->with('error', 'Erreur lors de l\'inscription de l\'utilisateur.');
        }

        $joueurModel = new JoueurModel();
        $joueurData = [
            'id' => $utilisateurId, 
            'nom' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'historique_reservations' => [], 
        ];

        $joueurInsertSuccess = $joueurModel->insert($joueurData);

        if (!$joueurInsertSuccess) {
            $utilisateurModel->delete($utilisateurId);
            return redirect()->back()->with('error', 'Erreur lors de l\'inscription du joueur.');
        }

        return redirect()->to('/')->with('success', 'Inscription réussie. Vous pouvez maintenant vous connecter.');
    }
}