<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReportsTable extends Migration
{
  public function up()
  {
      $this->forge->addField([
          'id' => [
              'type' => 'INT',
              'constraint' => 5,
              'unsigned' => true,
              'auto_increment' => true,
          ],
          'name' => [
              'type' => 'VARCHAR',
              'constraint' => 100,
          ],
          'email' => [
              'type' => 'VARCHAR',
              'constraint' => 100,
          ],
          'message' => [
              'type' => 'TEXT',
              'null' => true,
          ],
          'created_at' => [
              'type' => 'DATETIME',
              'null' => true,
          ],
      ]);

      $this->forge->addKey('id', true);
      $this->forge->createTable('reports');
  }

  public function down()
  {
      $this->forge->dropTable('reports');
  }
}
