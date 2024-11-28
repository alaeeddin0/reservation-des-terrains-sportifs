<?php

namespace App\Models;

use CodeIgniter\Model;

class CreneauModel extends Model
{
    protected $table = 'creneau';
    protected $primaryKey = 'id';
    protected $allowedFields = ['terrain_id', 'date', 'heure_debut', 'heure_fin', 'disponible'];
    protected $validationRules = [
        'terrain_id' => 'required|integer',
        'date' => 'required|valid_date',
        'heure_debut' => 'required|valid_time',
        'heure_fin' => 'required|valid_time',
        'disponible' => 'required|in_list[0,1]',
    ];

    protected $useTimestamps = true;

    
}
