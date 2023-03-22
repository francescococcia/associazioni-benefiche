<?php

namespace App\Models;
use CodeIgniter\Model;


class AssociationModel extends Model{

  protected $table = 'associations';

  protected $allowedFields = ['name', 'user_id', 'legal_address', 'tax_code'];

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
  
  // Define a new method in model for associations
public function getAssociationsWithUser()
{
    $builder = $this->db->table('associations');
    $builder->join('users', 'users.id = associations.user_id');
    return $builder->get()->getResult();
}

}