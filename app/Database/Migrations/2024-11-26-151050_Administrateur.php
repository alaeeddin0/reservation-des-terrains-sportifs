<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Administrateur extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
               'unsigned'       => true,
                'auto_increment' => true
            ],
            'nom' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
                
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('administrateurs');
    }

    public function down()
    {
        $this->forge->dropTable('administrateurs');
    }
}
