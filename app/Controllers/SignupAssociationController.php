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
    // Load the model
    $this->load->model('AssociationModel');

    // Get the input data from the form
    $taxCode = $this->request->getPost('tax_code');
    $headOffice = $this->request->getPost('head_office');

    // Get the user ID from the session
    $userId = session()->get('user_id');

    // Create the association
    $associationData = [
        'user_id' => $userId,
        'tax_code' => $taxCode,
        'head_office' => $headOffice,
    ];

    $associationId = $this->AssociationModel->create($associationData);

    if (!$associationId) {
        return redirect()->back()->withInput()->with('error', 'Failed to create the association.');
    }

    return redirect()->to('/associations/' . $associationId)->with('success', 'Association created successfully.');
  }
  // public function store()
  // {
  //   helper(['form']);
  //   $rules = [
  //     'name'          => 'required|min_length[2]|max_length[50]',
  //     'head_office'          => 'required|min_length[2]|max_length[50]',
  //     'tax_code'          => 'required|min_length[2]|max_length[50]',
  //     'password'      => 'required|min_length[4]|max_length[50]',
  //     'confirmpassword'  => 'matches[password]'
  //   ];


  //   if($this->validate($rules)){
  //     $userModel = new UserModel();
  //     $associationModel = new AssociationModel();

  //     $data = [
  //       // 'first_name'     => $this->request->getVar('first_name'),
  //       // 'last_name'     => $this->request->getVar('last_name'),
  //       'email'    => $this->request->getVar('email'),
  //       'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
  //     ];

  //     $data_association = [
  //       'name'     => $this->request->getVar('first_name'),
  //       'head_office'    => $this->request->getVar('head_office'),
  //       'tax_code'    => $this->request->getVar('tax_code'),
  //       'email'    => $this->request->getVar('email'),
  //     ];
  //     echo $data_association;

  //     $userModel->save($data);
  //     $associationModel->save($data_association);

  //     return redirect()->to('/signin');
  //   }else{
  //     $data['validation'] = $this->validator;
  //     echo view('signup', $data);
  //   }
  // }
}
