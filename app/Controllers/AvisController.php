<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UtilisateurModel;
use App\Models\CommentaireModel;

class AvisController extends BaseController
{
    public function index(): string
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
        $commentaireModel = new CommentaireModel();
        $avis = $commentaireModel->where('joueur_id', $user['id'])->findAll();

        return view('joueur/Avis', [
            'nom' => $utilisateur['nom'],
            'dateActuelle' => date('D, d M Y'), 
            'avis' => $avis,
        ]);
    }
    public function store()
    {
        $session = session();
        $user = $session->get('user');
        if (!$user || !isset($user['id'])) {
            return redirect()->to('/')->with('error', 'Vous devez être connecté pour soumettre un avis.');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'titre' => 'required|min_length[3]|max_length[255]',
            'contenu' => 'required|min_length[5]',
            'note' => 'required|integer|greater_than[0]|less_than[6]', 
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('errors', $validation->getErrors())->withInput();
        }

        $joueur_id = $user['id'];
        $commentaireModel = new CommentaireModel();
        $data = [
            'titre' => $this->request->getPost('titre'),
            'joueur_id' => $joueur_id,
            'contenu' => $this->request->getPost('contenu'),
            'note' => $this->request->getPost('note'),
        ];

        if (!$commentaireModel->insert($data)) {
            return redirect()->back()->with('errors', $commentaireModel->errors())->withInput();
        }

        return redirect()->to('/Avis');
    }

    public function edit($id)
    {
        $session = session();
        $user = $session->get('user');
        if (!$user || !isset($user['id'])) {
            return redirect()->to('/')->with('error', 'Vous devez être connecté pour modifier un avis.');
        }

        $commentaireModel = new CommentaireModel();
        $avis = $commentaireModel->find($id);

        if (!$avis || $avis['joueur_id'] !== $user['id']) {
            return redirect()->to('/Avis')->with('error', 'Avis introuvable ou vous n\'êtes pas autorisé à le modifier.');
        }

        return view('/Avis', [
            'avis' => $avis,
        ]);
    }

    public function delete($id)
    {
        $session = session();
        $user = $session->get('user');
        if (!$user || !isset($user['id'])) {
            return redirect()->to('/')->with('error', 'Vous devez être connecté pour supprimer un avis.');
        }

        $commentaireModel = new CommentaireModel();
        $avis = $commentaireModel->find($id);

        if (!$avis || $avis['joueur_id'] !== $user['id']) {
            return redirect()->to('/Avis')->with('error', 'Avis introuvable ou vous n\'êtes pas autorisé à le supprimer.');
        }

        if (!$commentaireModel->delete($id)) {
            return redirect()->back()->with('error', 'Impossible de supprimer cet avis.');
        }

        return redirect()->to('/Avis');
    }

    public function update($id)
    {
        $session = session();
        $user = $session->get('user');
        if (!$user || !isset($user['id'])) {
            return redirect()->to('/')->with('error', 'Vous devez être connecté pour modifier un avis.');
        }

        $commentaireModel = new CommentaireModel();
        $avis = $commentaireModel->find($id);

        if (!$avis || $avis['joueur_id'] !== $user['id']) {
            return redirect()->to('/Avis')->with('error', 'Avis introuvable ou vous n\'êtes pas autorisé à le modifier.');
        }
        $validation = \Config\Services::validation();
        $validation->setRules([
            'titre' => 'required|min_length[3]|max_length[255]',
            'contenu' => 'required|min_length[5]',
            'note' => 'required|integer|greater_than[0]|less_than[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('errors', $validation->getErrors())->withInput();
        }

        $data = [
            'titre' => $this->request->getPost('titre'),
            'contenu' => $this->request->getPost('contenu'),
            'note' => $this->request->getPost('note'),
        ];

        if (!$commentaireModel->update($id, $data)) {
            return redirect()->back()->with('errors', $commentaireModel->errors())->withInput();
        }

        return redirect()->to('/Avis')->with('success', 'Avis mis à jour avec succès.');
    }


}