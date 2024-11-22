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

        // Vérifie si l'utilisateur existe avec cet email
        $user = $utilisateurModel->where('LOWER(email)', strtolower($email))->first();


        if ($user) {
            // Vérifie le mot de passe
            if (password_verify($password, $user['password'])) {
                // Mettre les informations de l'utilisateur en session
                session()->set('user', [
                    'id' => $user['id'],
                    'nom' => $user['nom'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                ]);

                // Redirige en fonction du rôle
                return $user['role'] === 'admin' 
                    ? redirect()->to('/admin/AdminHome') 
                    : redirect()->to('/joueur/JoueurHome');
            } else {
                // Mot de passe incorrect
                return redirect()->back()->with('error', 'Mot de passe incorrect.');
            }
        } else {
            // Email non trouvé
            return redirect()->back()->with('error', 'Utilisateur non trouvé.' . $email);
        }
    }

    public function logout()
    {
        // Détruire la session
        session()->destroy();
        return redirect()->to('/');
    }
}
