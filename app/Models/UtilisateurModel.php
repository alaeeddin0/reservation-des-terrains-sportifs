<?php

namespace App\Models;

use CodeIgniter\Model;

class UtilisateurModel extends Model
{
    protected $table = 'utilisateur';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nom',
        'email',
        'password',
        'role',
        'reset_token',
        'reset_expires'
    ];
    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[utilisateur.email]',
        'password' => 'required|min_length[6]',
        'role' => 'required|in_list[admin,joueur]'
    ];
        public function countAllUsers()
     {
         return $this->countAll();
     }
 
     public function countAllJoueur()
     {
         return $this->where('role', 'joueur')->countAll();
     }
 
     public function getUtilisateur()
     {
         return $this->where('role', 'joueur')->findAll();
     }

}
