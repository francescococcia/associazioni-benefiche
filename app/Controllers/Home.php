<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\AssociationModel;

class Home extends BaseController
{
  public function index()
  {
    $userModel = new UserModel();
    $userId = session()->get('id');
    $userData = $userModel->find($userId);

    $isLoggedIn = session()->get('isLoggedIn');
    $data['isLoggedIn'] = $isLoggedIn;
    $data['userData'] = $userData;

    $associationModel = new AssociationModel();
    $associations = $associationModel->findAll();
    $data['associations'] = $associations;

    return view('Home/index', $data);
  }

  public function chi_siamo()
  {
    return view('chi_siamo');
  }

  public function exit()
  {
    session()->destroy();
    return redirect()->to('/signin');
  }
}
