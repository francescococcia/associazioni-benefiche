<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\AssociationModel;

class SignupAssociationController extends Controller
{
  public function index()
  {
    helper(['form']);
    $data = [];
    echo view('signup_association', $data);
  }


  public function store()
  {
    helper(['form']);

    $rules = [
      'name'          => 'required|min_length[2]|max_length[50]',
      'legal_address'   => 'required|min_length[2]|max_length[50]',
      'tax_code'      => 'required|min_length[2]|max_length[50]',
      'email'         => 'required|valid_email|is_unique[users.email]',
      'password'      => 'required|min_length[4]|max_length[50]',
      'confirmpassword'  => 'matches[password]'
    ];

    if ($this->validate($rules)) {
      $userModel = new UserModel();
      $associationModel = new AssociationModel();

      $userData = [
        'email'    => $this->request->getVar('email'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        'is_admin' => false,
        'is_platform_manager' => true,
      ];

      $userId = $userModel->insert($userData);

      $associationData = [
          'name'          => $this->request->getVar('name'),
          'legal_address'   => $this->request->getVar('legal_address'),
          'tax_code'      => $this->request->getVar('tax_code'),
          'user_id'       => $userId,
      ];

      $associationModel->insert($associationData);

      return redirect()->to('/signin');
    } else {
      $data['validation'] = $this->validator;
      echo view('signup_association', $data);
    }
  }
}
