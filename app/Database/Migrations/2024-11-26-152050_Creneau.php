<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Creneau extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'date'        => [
                'type'       => 'DATE',
                'null'       => false,
            ],
            'heure_debut' => [
                'type'       => 'TIME',
                'null'       => false,
            ],
            'heure_fin'   => [
                'type'       => 'TIME',
                'null'       => false,
            ],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('creneau');
    }

    public function down()
    {
        $this->forge->dropTable('creneau');
    }
}
