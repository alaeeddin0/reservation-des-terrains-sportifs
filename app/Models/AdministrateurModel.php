<?php

namespace App\Models;

use CodeIgniter\Model;

class AdministrateurModel extends Model
{
    protected $table = 'administrateur';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id'];
 
}
