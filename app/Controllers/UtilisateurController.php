<?php
namespace App\Controllers;

use App\Models\UtilisateurModel;

class UtilisateurController extends BaseController
{
    public function index()
    {
        $UtilisateurModel = new UtilisateurModel();
        
        $totalUsers = $UtilisateurModel->countAllUsers();
        
        $totalJoueur = $UtilisateurModel->countAllJoueur();
        
        $Utilisateur = $UtilisateurModel->getUtilisateur();
    
        return view('liste_Utilisateurs', [
            'totalJoueur' => $totalJoueur,
            'Utilisateur' => $Utilisateur,
            'totalUsers'  => $totalUsers
        ]);
    }
    

    public function delete($id)
    {
        $UtilisateurModel = new UtilisateurModel();

        $user = $UtilisateurModel->find($id);
        if ($user) {
            if ($UtilisateurModel->delete($id)) {
              
                $totalUsers = $UtilisateurModel->countAllUsers();
        
        $totalJoueur = $UtilisateurModel->countAllJoueur();
        
        $Utilisateur = $UtilisateurModel->getUtilisateur();
                return view('liste_Utilisateurs', [
                    'totalJoueur' => $totalJoueur,
                    'Utilisateur' => $Utilisateur,
                    'totalUsers'  => $totalUsers
                ]);
            } else {
               
                $totalUsers = $UtilisateurModel->countAllUsers();
        
        $totalJoueur = $UtilisateurModel->countAllJoueur();
        
        $Utilisateur = $UtilisateurModel->getUtilisateur();
                return view('liste_Utilisateurs', [
                    'totalJoueur' => $totalJoueur,
                    'Utilisateur' => $Utilisateur,
                    'totalUsers'  => $totalUsers
                ]);
            }
        } else {
          
            $totalUsers = $UtilisateurModel->countAllUsers();
        
        $totalJoueur = $UtilisateurModel->countAllJoueur();
        
        $Utilisateur = $UtilisateurModel->getUtilisateur();
            return view('liste_Utilisateurs', [
                'totalJoueur' => $totalJoueur,
                'Utilisateur' => $Utilisateur,
                'totalUsers'  => $totalUsers
            ]);
        }
    }

   public function update($id)
{
    $UtilisateurModel = new UtilisateurModel();
    $data = [];

    if ($this->request->getPost('nom')) {
        $data['nom'] = $this->request->getPost('nom');
    }

    if ($this->request->getPost('email')) {
        $data['email'] = $this->request->getPost('email');
    }

    if (!empty($data)) {

        if ($UtilisateurModel->update($id, $data)) {
            $totalUsers = $UtilisateurModel->countAllUsers();
        
            $totalJoueur = $UtilisateurModel->countAllJoueur();
            
            $Utilisateur = $UtilisateurModel->getUtilisateur();
            return view('liste_Utilisateurs', [
                'totalJoueur' => $totalJoueur,
                'Utilisateur' => $Utilisateur,
                'totalUsers'  => $totalUsers
            ]);
        } else {
          
            $totalUsers = $UtilisateurModel->countAllUsers();
        
        $totalJoueur = $UtilisateurModel->countAllJoueur();
        
        $Utilisateur = $UtilisateurModel->getUtilisateur();
            return view('liste_Utilisateurs', [
                'totalJoueur' => $totalJoueur,
                'Utilisateur' => $Utilisateur,
                'totalUsers'  => $totalUsers
            ]);
        }
    } else {
       
        $totalUsers = $UtilisateurModel->countAllUsers();
        
        $totalJoueur = $UtilisateurModel->countAllJoueur();
        
        $Utilisateur = $UtilisateurModel->getUtilisateur();
        return view('liste_Utilisateurs', [
            'totalJoueur' => $totalJoueur,
            'Utilisateur' => $Utilisateur,
            'totalUsers'  => $totalUsers
        ]);
    }
}

}
