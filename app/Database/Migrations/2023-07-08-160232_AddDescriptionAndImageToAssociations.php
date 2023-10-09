<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDescriptionAndImageToAssociations extends Migration
{
  public function up()
  {
    $this->forge->addColumn('associations', [
        'description' => [
            'type' => 'TEXT',
            'null' => true,
        ],
        'image' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => false,
        ],
    ]);
  }

  public function down()
  {
    $this->forge->dropColumn('associations', 'description');
    $this->forge->dropColumn('associations', 'image');
  }
}
