<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationsModel extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['joueur_id', 'terrain_id', 'creneau_id', 'statut','is_paid'];
    protected $validationRules = [
        'joueur_id' => 'required|integer',
        'terrain_id' => 'required|integer',
        'creneau_id' => 'required|integer',
        'statut' => 'required|in_list[confirmée,en attente,annulée]',
        'is_paid' => 'required|in_list[0,1]',
    ];
    public function getAllReservationsWithDetails()
    {
        return $this->db->table('reservations')
            ->select('
                joueur.nom AS joueur_name,
                terrains.type_sport AS terrains_type,
                terrains.localisation AS terrains_localisation,
                creneau.date AS date,
                creneau.heure_debut AS heure_debut,
                creneau.heure_fin AS heure_fin,
                reservations.statut AS statut,
                reservations.id AS id
            ')
            ->join('joueur', 'reservations.joueur_id = joueur.id')
            ->join('terrains', 'reservations.terrain_id = terrains.id')
            ->join('creneau', 'reservations.creneau_id = creneau.id')
            ->get()
            ->getResultArray();
    }
    public function getReservationCounts()
    {
        $totalReservations = $this->countAll();

        $confirmedReservations = $this->where('statut', 'confirmée')->countAllResults();
        $pendingReservations = $this->where('statut', 'en attente')->countAllResults();
       // $cancelledReservations = $this->where('statut', 'annulée')->countAllResults();

        return [
            'total' => $totalReservations,
            'confirmée' => $confirmedReservations,
            'en attente' => $pendingReservations
           // 'annulée' => $cancelledReservations
        ];
    }
}
?>
