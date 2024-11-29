<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Joueur extends Migration
{
        public function up()
        {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                    'null'           => false,
                ],
                'id_U' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'null'           => false,
                ],
                'nom' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '20',
                    'null'       => true,   
                ],
                'email' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '30',
                    'null'       => true,   
                ],
                'historique_reservations' => [
                    'type'       => 'TEXT',
                    'null'       => true,   
                ],
            ]);
    
            $this->forge->addPrimaryKey('id');
    
             $this->forge->addForeignKey('id_U', 'utilisateur', 'id', 'CASCADE', 'CASCADE');
    
            $this->forge->createTable('joueur');
        }
    
        public function down()
        {
            $this->forge->dropTable('joueur');
        }
    }
    
