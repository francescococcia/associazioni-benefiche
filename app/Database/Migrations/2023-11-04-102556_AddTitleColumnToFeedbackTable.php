<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTitleColumnToFeedbackTable extends Migration
{
  public function up()
  {
      $this->forge->addColumn('feedbacks', [
          'title' => [
              'type' => 'VARCHAR',
              'constraint' => 100, // Modify the constraint according to your needs
              'null' => true,
          ],
      ]);
  }

  public function down()
  {
      $this->forge->dropColumn('feedbacks', 'title');
  }
}
