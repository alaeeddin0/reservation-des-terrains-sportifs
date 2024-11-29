<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ListeClients extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nom' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'prenom' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'telephone' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
            ],
            'age' => [
                'type' => 'INT',
            ],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('clients');
    }

    public function down()
    {
        $this->forge->dropTable('clients');
    }
}
