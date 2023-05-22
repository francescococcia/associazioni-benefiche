<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnToProducts extends Migration
{
    public function up()
    {
        $this->forge->addColumn('products', [
            'quantity' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 0,
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
