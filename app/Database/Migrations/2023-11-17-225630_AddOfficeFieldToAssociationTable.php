<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOfficeFieldToAssociationTable extends Migration
{
  public function up()
  {
      $this->forge->addColumn('associations', [
          'office' => [
              'type' => 'VARCHAR',
              'constraint' => 255,
              'null' => true, // or false depending on your requirements
          ],
      ]);
  }

  public function down()
  {
      $this->forge->dropColumn('associations', 'office');
  }
}
