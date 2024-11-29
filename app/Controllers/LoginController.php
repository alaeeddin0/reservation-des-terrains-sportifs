<?php

namespace App\Controllers;
use App\Models\UtilisateurModel;
use App\Models\JoueurModel;

class LoginController extends BaseController
{
    public function index(): string
    {
        return view('auth/login');
    }
    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $utilisateurModel = new UtilisateurModel();

        $user = $utilisateurModel->where('LOWER(email)', strtolower($email))->first();


        if ($user) {
            if (password_verify($password, $user['password'])) {
                session()->set('user', [
                    'id' => $user['id'],
                    'nom' => $user['nom'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                ]);

                return $user['role'] === 'admin' 
                    ? redirect()->to('/Home')
                    : redirect()->to('/joueur/JoueurHome');
            } else {
                return redirect()->back()->with('error', 'Mot de passe incorrect.');
            }
        } else {
            return redirect()->back()->with('error', 'Utilisateur non trouvé.' . $email);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
