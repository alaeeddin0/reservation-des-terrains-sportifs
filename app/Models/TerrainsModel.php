<?php
namespace App\Models;

use CodeIgniter\Model;

class TerrainsModel extends Model
{
    protected $table = 'terrains';
    protected $primaryKey = 'id';
    protected $allowedFields = ['localisation', 'img_url', 'prix', 'type_sport'];
    protected $validationRules = [
        'localisation' => 'required|string',
        'prix' => 'required|decimal',
        'type_sport' => 'required|string',
    ];
}
?>