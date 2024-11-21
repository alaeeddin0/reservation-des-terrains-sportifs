<?php

namespace App\Models;

use CodeIgniter\Model;

class PaiementModel extends Model
{
    protected $table = 'paiement';
    protected $primaryKey = 'id';
    protected $allowedFields = ['reservation_id', 'montant', 'statut'];
    protected $validationRules = [
        'reservation_id' => 'required|integer',
        'montant'        => 'required|decimal',
        'statut'         => 'required|in_list[payée,non payée]',
    ];

  
    public function reservation()
    {
        return $this->belongsTo('App\Models\ReservationsModel', 'reservation_id', 'id');
    }
}
