<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateNewsDescription extends Migration
{
  public function up()
  {
      $fields = [
          'description' => [
              'type' => 'VARCHAR',
              'constraint' => 1000,
          ],
      ];

      $this->forge->modifyColumn('news', $fields);
  }

    public function down()
    {
        //
    }
}
