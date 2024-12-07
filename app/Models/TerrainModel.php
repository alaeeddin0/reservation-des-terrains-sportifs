<?php

namespace App\Models;

use CodeIgniter\Model;

class TerrainModel extends Model
{
    protected $table = 'terrains';

    protected $primaryKey = 'id';

    protected $allowedFields = ['localisation','image_url', 'prix', 'type_sport'];

    
    protected $validationRules = [
        'localisation'  => 'required|string|max_length[255]',
        'prix'           => 'required|decimal',
        'type_sport'     => 'required|in_list[Football,Tennis,Basketball]',
      
    ];

    
    protected $validationMessages = [
        'localisation' => [
            'required'  => 'La localisation est obligatoire',
            'string'    => 'La localisation doit être une chaîne de caractères',
            'max_length'=> 'La localisation ne peut pas dépasser 255 caractères',
        ],
        'prix' => [
            'required' => 'Le prix est obligatoire',
            'decimal'  => 'Le prix doit être un nombre décimal',
        ],
        'type_sport' => [
            'required' => 'Le type de sport est obligatoire',
            'in_list'  => 'Le type de sport doit être l\'un des suivants : Football, Tennis, Basketball',
        ],
    ];

   
    public function getTerrains()
    {
        return $this->asArray()->findAll();
    }

    public function getTerrain($id)
    {
        return $this->asArray()->find($id);
    }

    public function addTerrain($data)
    {
        return $this->insert($data);
    }

    public function updateTerrain($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteTerrain($id)
    {
        return $this->delete($id);
    }
}
