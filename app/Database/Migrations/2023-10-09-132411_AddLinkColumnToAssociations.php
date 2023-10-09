<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddLinkColumnToAssociations extends Migration
{
  public function up()
  {
      $this->forge->addColumn('associations', [
          'link' => [
              'type' => 'VARCHAR',
              'constraint' => 255, // Adjust the constraint as needed
              'null' => true, // Set to true if the column allows NULL values
          ],
      ]);
  }

  public function down()
  {
      $this->forge->dropColumn('associations', 'link');
  }
  
}
