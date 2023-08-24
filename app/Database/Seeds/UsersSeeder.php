<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $userModel = new \App\Models\UserModel();
      // Code to insert data into the `users` table
      $userData = [
          [
              'first_name' => 'john',
              'last_name' => 'doe',
              'phone_number' => '3245434',
              'birth_date' => '2000-01-01',
              'email' => 'john@example.com',
              'password' => password_hash('password123', PASSWORD_DEFAULT),
              'is_platform_manager' => true,
          ],
          [
              'first_name' => 'johs',
              'last_name' => 'dos',
              'phone_number' => '3245434',
              'birth_date' => '2000-01-01',
              'email' => 'john1@example.com',
              'password' => password_hash('password123', PASSWORD_DEFAULT),
              'is_platform_manager' => true,
          ],
          [
              'first_name' => 'bob',
              'last_name' => 'dos',
              'phone_number' => '3245434',
              'birth_date' => '2000-01-01',
              'email' => 'bob@example.com',
              'password' => password_hash('password123', PASSWORD_DEFAULT),
              'is_platform_manager' => true,
          ],
          [
              'first_name' => 'rob',
              'last_name' => 'dos',
              'phone_number' => '3245434',
              'birth_date' => '2000-01-01',
              'email' => 'rob@example.com',
              'password' => password_hash('password123', PASSWORD_DEFAULT),
              'is_platform_manager' => true,
          ],
          [
              'first_name' => 'tod',
              'last_name' => 'dos',
              'phone_number' => '3245434',
              'birth_date' => '2000-01-01',
              'email' => 'tod@example.com',
              'password' => password_hash('password123', PASSWORD_DEFAULT),
              'is_platform_manager' => true,
          ],
          // Add more data as needed
        ];

        foreach ($userData as $user) {
            $userModel->insert($user);
        }
    }
}
