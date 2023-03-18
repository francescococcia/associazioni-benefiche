<?php

namespace App\Models;
use CodeIgniter\Model;


class UserModel extends Model{

  protected $table = 'users';

  protected $allowedFields = [
    'first_name',
    'last_name',
    'phone_number',
    'birth_date',
    'email',
    'password',
    'is_admin',
    'is_platform_manager'
  ];
}
