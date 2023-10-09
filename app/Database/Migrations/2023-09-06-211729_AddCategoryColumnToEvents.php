<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCategoryColumnToEvents extends Migration
{
    public function up()
    {
      $this->forge->addColumn('events', [
        'category' => [
            'type' => 'VARCHAR',
            'constraint' => 255, // Adjust the constraint as needed
            'null' => true, // Set to true if the column can be nullable
        ],
      ]);
    }
    

    public function down()
    {
      $this->forge->dropColumn('events', 'category');
    }
}
