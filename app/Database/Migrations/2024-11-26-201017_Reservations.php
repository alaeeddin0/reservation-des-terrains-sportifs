<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reservations extends Migration
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
            'creneau_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'           => false,
            ],
            'statut' => [
                'type'       => 'ENUM',
                'constraint' => ['confirmée', 'en attente', 'annulée'],
                'null'       => false,
            ]
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->addKey('joueur_id');
        $this->forge->addKey('terrain_id');
        $this->forge->addKey('creneau_id');

        $this->forge->addForeignKey('joueur_id', 'joueur', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('terrain_id', 'terrains', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('creneau_id', 'creneau', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('reservations');
    }

    public function down()
    {
        $this->forge->dropTable('reservations');
    }
}
