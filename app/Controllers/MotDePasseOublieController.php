<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UtilisateurModel;

class MotDePasseOublieController extends BaseController
{
    public function index(): string
    {
        return view('auth/mot_de_passe_oublie');
    }

    public function envoyerEmail()
    {
        $email = $this->request->getPost('email');

        // Vérifiez si l'e-mail existe dans la base de données
        $utilisateurModel = new UtilisateurModel();
        $user = $utilisateurModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Cet e-mail n\'existe pas dans notre base de données.');
        }

        // Générer un jeton unique
        $token = bin2hex(random_bytes(16));

        // Enregistrez le jeton avec une date d'expiration (par exemple, 1 heure) dans la base de données
        $utilisateurModel->update($user['id'], [
            'reset_token' => $token,
            'reset_expires' => date('Y-m-d H:i:s', strtotime('+1 hour'))
        ]);

        // Envoyer l'email
        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setSubject('Réinitialisation de mot de passe');
        $emailService->setMessage("
            Bonjour, <br><br>
            Vous avez demandé à réinitialiser votre mot de passe. Cliquez sur le lien ci-dessous pour réinitialiser votre mot de passe :
            <br><br>
            <a href='" . site_url('mot_de_passe_oublie/reset/' . $token) . "'>Réinitialiser mon mot de passe</a>
            <br><br>
            Ce lien expirera dans 1 heure.
        ");

        if ($emailService->send()) {
            return redirect()->back()->with('success', 'Un e-mail a été envoyé avec un lien pour réinitialiser votre mot de passe.');
        } else {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'envoi de l\'e-mail.');
        }
    }

    public function reset($token)
    {
        // Vérifiez si le jeton est valide
        $utilisateurModel = new UtilisateurModel();
        $user = $utilisateurModel->where('reset_token', $token)
            ->where('reset_expires >=', date('Y-m-d H:i:s'))
            ->first();

        if (!$user) {
            return redirect()->to('/')->with('error', 'Jeton invalide ou expiré.');
        }

        return view('auth/reset_password', ['token' => $token]);
    }

    public function mettreAJourMotDePasse()
    {
        $token = $this->request->getPost('token');
        $nouveauMotDePasse = $this->request->getPost('password');

        // Vérifiez si le jeton est valide
        $utilisateurModel = new UtilisateurModel();
        $user = $utilisateurModel->where('reset_token', $token)
            ->where('reset_expires >=', date('Y-m-d H:i:s'))
            ->first();

        if (!$user) {
            return redirect()->to('/')->with('error', 'Jeton invalide ou expiré.');
        }

        // Mettez à jour le mot de passe
        $utilisateurModel->update($user['id'], [
            'password' => password_hash($nouveauMotDePasse, PASSWORD_DEFAULT),
            'reset_token' => null, // Supprimez le jeton après utilisation
            'reset_expires' => null
        ]);

        return redirect()->to('/')->with('success', 'Votre mot de passe a été mis à jour avec succès.');
    }
}
