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
    
}
?>
