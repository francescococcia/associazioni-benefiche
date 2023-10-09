<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FeedbacksSeeder extends Seeder
{
    public function run()
    {
      $data = [
        [
          'user_id' => 1,
          'message' => 'lol',
          'rating' => 5,
          'participant_id' => 28,
        ],
      ];

      $this->db->table('feedbacks')->insertBatch($data);
    }
}
