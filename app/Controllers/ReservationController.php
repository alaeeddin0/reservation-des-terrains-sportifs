<?php

namespace App\Controllers;

use App\Models\UtilisateurModel;
use App\Models\ReservationsModel;
use App\Models\TerrainsModel;
use App\Models\CreneauModel;
use App\Models\JoueurModel;

class ReservationController extends BaseController
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

        $reservationModel = new ReservationsModel();
        $terrainModel = new TerrainsModel();
        $creneauModel = new CreneauModel();

        $terrains = $terrainModel->findAll();
        $creneaux = $creneauModel->findAll();
        $creneauxDisponibles = $creneauModel->where('disponible', true)->findAll();
        $reservations = $reservationModel->where('joueur_id', $user['id'])->findAll();


        return view('joueur/Reservation', [
            'nom' => $utilisateur['nom'],
            'dateActuelle' => date('D, d M Y'),
            'reservations' => $reservations,
            'terrains' => $terrains,
            'creneaux' => $creneaux,
            'creneauxDisponibles' => $creneauxDisponibles,
            'session' => $session,
        ]);
    }

    public function create()
    {
        $session = session();
        $user = $session->get('user');
        if (!$user) {
            return redirect()->to('/')->with('error', 'Veuillez vous connecter.');
        }

        $terrainModel = new TerrainsModel();
        $reservationModel = new ReservationsModel();
        $creneauModel = new CreneauModel();
        $joueurModel = new JoueurModel();

        // Ensure the player exists
        $joueur = $joueurModel->find($user['id']);
        if (!$joueur) {
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }

        $validation = \Config\Services::validation();
        if (
            !$this->validate([
                'terrain_id' => 'required|integer',
                'creneau_id' => 'required|integer',
            ])
        ) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $terrain = $terrainModel->find($this->request->getPost('terrain_id'));
        $creneau = $creneauModel->find($this->request->getPost('creneau_id'));

        if (!$terrain || !$creneau || !$creneau['disponible']) {
            return redirect()->back()->with('error', 'Terrain ou créneau non disponible.');
        }

        $existingReservation = $reservationModel
            ->where('creneau_id', $creneau['id'])
            ->where('terrain_id', $terrain['id'])
            ->first();

        if ($existingReservation) {
            return redirect()->back()->with('error', 'Le créneau est déjà réservé.');
        }

        try {
            $reservationModel->save([
                'joueur_id' => $user['id'],
                'terrain_id' => $terrain['id'],
                'creneau_id' => $creneau['id'],
                'statut' => 'en attente',
                'is_paid' => '0',
                'prix' => $terrain['prix'],
            ]);
            $creneauModel->update($creneau['id'], ['disponible' => 0]);

            $historique_reservations = $joueur['historique_reservations'] ?? [];
            $historique_reservations = []; 
            $historique_reservations[] = $reservationModel->getInsertID();

            $joueurModel->update($user['id'], [
                'historique_reservations' => $historique_reservations
            ]);

            return redirect()->to('/Reservation')->with('success', 'Réservation créée avec succès !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la réservation : ' . $e->getMessage());
        }
    }



    public function delete($id)
    {
        $reservationModel = new ReservationsModel();
        $creneauModel = new CreneauModel();
        $reservation = $reservationModel->find($id);
        if (!$reservation) {
            return redirect()->back()->with('error', 'Réservation non trouvée.');
        }
        $deleteSuccess = $reservationModel->delete($id);
        if ($deleteSuccess) {
            $creneauUpdateSuccess = $creneauModel->update($reservation['creneau_id'], ['disponible' => 1]);
            if ($creneauUpdateSuccess) {
                return redirect()->to('/Reservation')->with('success', 'Réservation supprimée et créneau mis à jour avec succès.');
            } else {
                return redirect()->to('/Reservation')->with('success', 'Erreur lors de la mise à jour du créneau.');
            }
        }
    }
    public function edit($id)
    {
        $session = session();
        $user = $session->get('user');

        if (!$user || !isset($user['id'])) {
            return redirect()->to('/')->with('error', 'Vous devez être connecté pour modifier une réservation.');
        }

        $reservationModel = new ReservationsModel();
        $reservation = $reservationModel->find($id);

        if (!$reservation) {
            return redirect()->to('/Reservation')->with('error', 'Réservation introuvable.');
        }

        if ($reservation['joueur_id'] !== $user['id']) {
            return redirect()->to('/Reservation')->with('error', 'Vous ne pouvez pas modifier cette réservation.');
        }
        return view('Reservation/edit', [
            'reservation' => $reservation,
        ]);
    }
    public function update($id)
    {
        $session = session();
        $user = $session->get('user');
        if (!$user || !isset($user['id'])) {
            return redirect()->to('/')->with('error', 'Vous devez être connecté pour modifier une réservation.');
        }
        $reservationModel = new ReservationsModel();
        $creneauModel = new CreneauModel();
        $reservation = $reservationModel->find($id);
        if (!$reservation || $reservation['joueur_id'] !== $user['id']) {
            return redirect()->to('/Reservation')->with('error', 'Réservation introuvable ou non autorisée.');
        }
        $validation = \Config\Services::validation();
        $validation->setRules([
            'terrain_id' => 'required|integer',
            'creneau_id' => 'required|integer',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('errors', $validation->getErrors())->withInput();
        }

        $data = [
            'terrain_id' => $this->request->getPost('terrain_id'),
            'creneau_id' => $this->request->getPost('creneau_id'),
        ];
        if (empty($data['terrain_id']) || empty($data['creneau_id'])) {
            return redirect()->back()->with('error', 'Les champs Terrain et Créneau sont requis.')->withInput();
        }
        $nouveauCreneau = $creneauModel->find($data['creneau_id']);
        if (!$nouveauCreneau || !$nouveauCreneau['disponible']) {
            return redirect()->back()->with('error', 'Le créneau sélectionné n\'est pas disponible.')->withInput();
        }
        try {
            if (!$reservationModel->update($id, $data)) {
                throw new \RuntimeException('Impossible de mettre à jour la réservation.');
            }
            if ($reservation['creneau_id'] != $data['creneau_id']) {
                $creneauModel->update($reservation['creneau_id'], ['disponible' => 1]);
                $creneauModel->update($data['creneau_id'], ['disponible' => 0]);
            }
            return redirect()->to('/Reservation')->with('success', 'Réservation mise à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur : ' . $e->getMessage())->withInput();
        }
    }

}
