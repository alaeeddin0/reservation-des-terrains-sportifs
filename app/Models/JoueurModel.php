<?php

namespace App\Models;

use CodeIgniter\Model;

class JoueurModel extends Model
{
    protected $table = 'joueur';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_U', 'nom', 'email', 'historique_reservations'];
    
    public function getJoueursWithReservations()
    {
        
        return $this->select('joueur.nom, joueur.historique_reservations, COUNT(joueur.id) as nombre_reservations')
                    ->join('utilisateur', 'utilisateur.id = joueur.id_U', 'left')
                    ->groupBy('joueur.id') 
                    ->findAll();
    }

    public function getJoueurCounts()
    {
        return $this->countAll(); 
    }
}