<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Commentaire extends Migration
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
            'joueur_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'           => false,
            ],
            'terrain_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'           => false,
            ],
            'contenu' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'note' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => null,
                'null'       => true,
                'check'      => 'note BETWEEN 1 AND 5', 
            ],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->addForeignKey('joueur_id', 'joueur', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('terrain_id', 'terrains', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('commentaire');
    }

    public function down()
    {
        $this->forge->dropTable('commentaire');
    }
}
