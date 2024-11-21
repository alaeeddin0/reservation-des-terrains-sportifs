<?php

namespace App\Models;

use CodeIgniter\Model;

class TerrainsModel extends Model
{
    protected $table = 'terrains';
    protected $primaryKey = 'id';
    protected $allowedFields = ['localisation', 'prix', 'type_sport', 'disponibilites'];
    protected $validationRules = [
        'localisation' => 'required|string',
        'prix'         => 'required|decimal',
        'type_sport'   => 'required|string',
        'disponibilites' => 'required|in_list[0,1]', 
    ];
    public function reservations()
    {
        return $this->hasMany('App\Models\ReservationsModel', 'terrain_id', 'id'); // Un terrain peut avoir plusieurs réservations
    }

    public function commentaires()
    {
        return $this->hasMany('App\Models\CommentaireModel', 'terrain_id', 'id'); // Un terrain peut avoir plusieurs commentaires
    }
}
