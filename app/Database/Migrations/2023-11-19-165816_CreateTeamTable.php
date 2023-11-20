<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTeamTable extends Migration
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
          'description' => [
              'type' => 'VARCHAR',
              'constraint' => '2000',
              'null' => true,
          ],
          'description_mission' => [
              'type' => 'VARCHAR',
              'constraint' => '2000',
              'null' => true,
          ],
          'image' => [
              'type' => 'VARCHAR',
              'constraint' => '255',
              'null' => true,
          ],
      ]);

      $this->forge->addPrimaryKey('id');
      $this->forge->createTable('team');
  }

  public function down()
  {
      $this->forge->dropTable('team');
  }

}
