<?php

namespace App\Models;

use CodeIgniter\Model;

class UtilisateurModel extends Model
{
    
    protected $table = 'utilisateur';

   
    protected $primaryKey = 'id';

    
    protected $allowedFields = ['nom', 'email', 'password', 'role', 'reset_token', 'reset_expires'];

    
    protected $validationRules = [
        'nom'          => 'required|max_length[100]',
        'email'        => 'required|valid_email|is_unique[utilisateur.email,id,{id}]', 
        'password'     => 'required|min_length[8]', 
        'role'         => 'required|in_list[admin,joueur]',
        'reset_token'  => 'max_length[64]',
        'reset_expires'=> 'valid_datetime', 
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Ce email est déjà pris.',
            'valid_email' => 'L\'email doit être valide.'
        ],
        'password' => [
            'min_length' => 'Le mot de passe doit comporter au moins 8 caractères.'
        ]
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
