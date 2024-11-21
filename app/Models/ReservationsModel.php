<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationsModel extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['joueur_id', 'terrain_id', 'creneau_id', 'statut'];
    protected $validationRules = [
        'joueur_id'  => 'required|integer',
        'terrain_id' => 'required|integer',
        'creneau_id' => 'required|integer',
        'statut'     => 'required|in_list[confirmée,en attente,annulée]',
    ];

    public function joueur()
    {
        return $this->belongsTo('App\Models\JoueurModel', 'joueur_id', 'id');
    }

    public function terrain()
    {
        return $this->belongsTo('App\Models\TerrainsModel', 'terrain_id', 'id');
    }

    public function creneau()
    {
        return $this->belongsTo('App\Models\CreneauModel', 'creneau_id', 'id');
    }
    public function paiement()
    {
        return $this->hasOne('App\Models\PaiementModel', 'reservation_id', 'id'); 
    }
}
