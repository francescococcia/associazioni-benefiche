<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToEventsTable extends Migration
{
  public function up()
  {
      // Add fields to the 'events' table
      $this->forge->addColumn('events', [
          'date_to' => [
              'type' => 'DATETIME',
              'null' => true,
          ],
          'link' => [
              'type' => 'VARCHAR',
              'constraint' => 255,
              'null' => true,
          ],
          'image' => [
              'type' => 'VARCHAR',
              'constraint' => 255,
              'null' => true,
          ],
      ]);
  }

  public function down()
  {
      // Drop the added fields if necessary (during rollback)
      $this->forge->dropColumn('events', 'date_to');
      $this->forge->dropColumn('events', 'link');
      $this->forge->dropColumn('events', 'image');
  }
}
