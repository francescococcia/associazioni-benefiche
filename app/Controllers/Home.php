<?php

namespace App\Controllers;
use App\Models\UserModel;

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

    return view('Home/index', $data);
  }

  public function exit()
  {
    session()->destroy();
    return redirect()->to('/signin');
  }
}
