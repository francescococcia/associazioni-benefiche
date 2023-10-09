<?php

namespace App\Models;
use CodeIgniter\Model;


class AssociationModel extends Model{

  protected $table = 'associations';

  protected $allowedFields = [
    'name',
    'user_id',
    'legal_address',
    'tax_code',
    'description',
    'image',
    'link'
  ];

  public function login($email, $password)
  {
    $userModel = new \App\Models\UserModel();

    // Find user by email
    $user = $userModel->where('email', $email)->first();

    if ($user && password_verify($password, $user['password'])) {
      // User found, check if they have an associated association
      $association = $this->where('user_id', $user['id'])->first();

      if ($association) {
          return $association;
      }
    }

    return false;
  }

  public function getUserWithAssociation($userId)
  {
    $builder = $this->db->table('associations');
    $builder->select('associations.id');
    $builder->where('associations.user_id', $userId);
    $query = $builder->get();
    $row = $query->getRow();
    return $row ? $row->id : null;
  }

  public function getAllAssociations()
  {
    $query =
      $this
        ->db
        ->table('associations')
        ->join('users', 'associations.user_id = users.id')
        ->select('associations.*, users.email')
        ->where('users.is_platform_manager', true)
        ->get();

    return $query->getResultArray();
  }
}
