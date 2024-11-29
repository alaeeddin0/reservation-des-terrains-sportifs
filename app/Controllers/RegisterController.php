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

        $validation->setRules([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[utilisateur.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $utilisateurModel = new UtilisateurModel();
        $userData = [
            'nom' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'joueur', 
        ];

        $utilisateurId = $utilisateurModel->insert($userData);

        $joueurModel = new JoueurModel();
        $joueurData = [
            'id' => $utilisateurId,  
            'nom' => $this->request->getPost('name'), 
            'email' => $this->request->getPost('email'),
            'historique_reservations' => '',  
        ];
        
        $joueurModel->insert($joueurData);

        return redirect()->to('/')->with('success', 'Inscription réussie. Vous pouvez maintenant vous connecter.');
    }
}
