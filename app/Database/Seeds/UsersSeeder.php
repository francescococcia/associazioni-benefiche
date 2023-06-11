<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
      // Code to insert data into the `users` table
      $data = [
          [
              'username' => 'john_doe',
              'email' => 'john@example.com',
              'password' => password_hash('password123', PASSWORD_DEFAULT),
          ],
          [
              'username' => 'jane_smith',
              'email' => 'jane@example.com',
              'password' => password_hash('password456', PASSWORD_DEFAULT),
          ],
          // Add more data as needed
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
