<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIsReadToReportsTable extends Migration
{
  public function up()
  {
      $this->forge->addColumn('reports', [
          'is_read' => [
              'type' => 'BOOLEAN',
              'default' => false, // You can change the default value if needed,
          ],
      ]);
  }
  

  public function down()
  {
      $this->forge->dropColumn('reports', 'is_read');
  }
  
}
