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

  public function getAllAssociationsWithPlatformManagers()
  {
    $builder = $this->db->table('users');
    $builder->select('users.*,associations.*');
    $builder->join('associations', 'users.id = associations.user_id');
    $builder->where('users.is_platform_manager', true);
    $query = $builder->get();
    return $query->getResultArray();
  }

  public function getAllUsers()
  {
    $builder = $this->db->table('users');
    $builder->select('users.*');
    $builder->where('users.is_platform_manager', false)->orWhere('is_platform_manager', false);
    $query = $builder->get();
    return $query->getResultArray();
  }

  public function getAllUsersCount()
  {
    $builder = $this->db->table('users');
    $builder->select('users.*');
    $builder->where('users.is_platform_manager', false)->orWhere('is_platform_manager', false);
    $count = $builder->countAllResults();
    return $count;
  }
}
