<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentaireModel extends Model
{
    protected $table = 'commentaire';
    protected $primaryKey = 'id';
    protected $allowedFields = ['titre','joueur_id', 'terrain_id', 'contenu', 'note','created_at'];
    protected $useTimestamps = true;

    protected $validationRules = [
        'joueur_id' => 'required|integer',
        // 'terrain_id' => 'required|integer',
        'contenu'    => 'required|string',
        'note'       => 'required|integer|greater_than[0]|less_than_equal_to[5]', 
        
    ];
    
    
    public function joueur()
    {
        return $this->belongsTo('App\Models\JoueurModel', 'joueur_id', 'id');
    }

    public function terrain()
    {
        return $this->belongsTo('App\Models\TerrainsModel', 'terrain_id', 'id');
    }
}
