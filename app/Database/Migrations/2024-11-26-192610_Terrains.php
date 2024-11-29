<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Terrains extends Migration
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
            'localisation' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'prix' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => false,
            ],
            'type_sport' => [
                'type'       => 'VARCHAR',
                'constraint' => ['Football', 'Tennis', 'Basketball'],
                'null'       => false,
            ],
            'disponibilites' => [
                'type'       => 'TINYINT',
                'constraint' => '1',
                'null'       => false,
                'default'    => 1,
            ],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('terrains');
    }

    public function down()
    {
        $this->forge->dropTable('terrains');
    }
}
