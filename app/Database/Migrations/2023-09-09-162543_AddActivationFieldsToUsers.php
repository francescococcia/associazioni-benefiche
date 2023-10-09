<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddActivationFieldsToUsers extends Migration
{
  public function up()
  {
      $fields = [
          'activation_token' => [
              'type' => 'VARCHAR',
              'constraint' => 255,
              'null' => true,
          ],
          'reset_token' => [
              'type' => 'VARCHAR',
              'constraint' => 255,
              'null' => true,
          ],
          'is_active' => [
              'type' => 'TINYINT',
              'constraint' => 1,
              'default' => 0,
          ]
      ];

      $this->forge->addColumn('users', $fields);
  }

  public function down()
  {
      $this->forge->dropColumn('users', 'activation_token');
      $this->forge->dropColumn('users', 'reset_token');
      $this->forge->dropColumn('users', 'is_active');
  }
}
