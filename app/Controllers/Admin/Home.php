<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Controllers\BaseController;

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
    $session = session();
    $data['session'] = $session->get();

    return view('admin/dashboard', $data);
  }

  public function exit()
  {
    session()->destroy();
    return redirect()->to('/signin');
  }
}
