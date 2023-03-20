<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\AssociationModel;


class ProfileController extends Controller
{
  public function index()
  {
    $data = ['titolo' => "ciao"];
    // $session = session();
    // $session = session();
    // $data = []; // create an empty array
    // $userModel = new UserModel();

    // $email = $this->request->getVar('email');
    // $password = $this->request->getVar('password');

    // $data = $userModel->where('email', $email)->first();
    // echo "Hello : ".$session->get('first_name');
    // return view('Profile/index', $data);
    // $data = []; // create an empty array
    // $email = $this->request->getVar('email');
    // $userModel = new UserModel();
    // $user = $userModel->where('email', $email)->first();

    // $data['user'] = $user; // add the user data to the array

    // echo view('Profile/index', $data);
    
    // Get the user data
    $userModel = new UserModel();
    $userId = session()->get('id');
    $userData = $userModel->find($userId);

    // Pass the user data to the view
    $data = [
        'userData' => $userData
    ];

    // Load the view
    return view('Profile/index', $data);
  }
  
  public function index2()
{
    $associationModel = new AssociationModel();
    $associations = $associationModel->findAll();
    
    $data = [
        'associations' => $associations
    ];

    return view('Profile/index', $data);
}
}
