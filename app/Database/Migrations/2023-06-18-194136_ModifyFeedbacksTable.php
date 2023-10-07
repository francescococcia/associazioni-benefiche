<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyFeedbacksTable extends Migration
{
  public function up()
  {
      $this->db->disableForeignKeyChecks();

      // Delete the 'subject' column
      $this->forge->dropColumn('feedbacks', 'subject');

      // Add the 'rating' column
      $this->forge->addColumn('feedbacks', [
          'rating' => [
              'type' => 'INT',
              'constraint' => 11,
              'null' => false,
          ],
      ]);

      // Add the 'participant_id' column
      $this->forge->addColumn('feedbacks', [
          'participant_id' => [
              'type' => 'INT',
              'constraint' => 11,
              'null' => false,
          ],
      ]);

      // Add the foreign key constraint
      $this->db->query('ALTER TABLE `feedbacks` ADD CONSTRAINT `fk_feedbacks_participants` FOREIGN KEY (`participant_id`) REFERENCES `participants`(`id`)');

      $this->db->enableForeignKeyChecks();
  }

  public function down()
  {
    $this->db->disableForeignKeyChecks();

    // Re-add the 'subject' column
    $this->forge->addColumn('feedbacks', [
        'subject' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => true,
        ],
    ]);

    // Remove the 'rating' column
    $this->forge->dropColumn('feedbacks', 'rating');

    // Remove the foreign key constraint
    $this->db->query('ALTER TABLE `feedbacks` DROP FOREIGN KEY `fk_feedbacks_participants`');

    // Remove the 'participant_id' column
    $this->forge->dropColumn('feedbacks', 'participant_id');

    $this->db->enableForeignKeyChecks();
  }
}
