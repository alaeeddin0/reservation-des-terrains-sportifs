<?php

namespace App\Models;

use CodeIgniter\Model;

class JoueurModel extends Model
{
    protected $table = 'joueur';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nom', 'email', 'historique_reservations'];
    public function reservations()
    {
        return $this->hasMany('App\Models\ReservationsModel', 'joueur_id', 'id'); // Un joueur peut faire plusieurs réservations
    }

    public function commentaires()
    {
        return $this->hasMany('App\Models\CommentaireModel', 'joueur_id', 'id'); // Un joueur peut laisser plusieurs commentaires
    }
}
