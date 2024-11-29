<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Utilisateur extends Migration
{
    public function up()
    {
        // Définition des champs pour la table 'utilisateur'
        $this->forge->addField([
           
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           => false,
            ],
            'nom'          => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'email'        => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'password'     => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'role'         => [
                'type'       => 'ENUM',
                'constraint' => ['admin', 'joueur'],
                'null'       => false,
            ],
            'reset_token'  => [
                'type'       => 'VARCHAR',
                'constraint' => '64',
                'null'       => true,
            ],
            'reset_expires'=> [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->addUniqueKey('email');

        $this->forge->createTable('utilisateur');
    }

    public function down()
    {
        $this->forge->dropTable('utilisateur');
    }
}
