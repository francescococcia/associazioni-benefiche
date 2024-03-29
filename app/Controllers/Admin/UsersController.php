<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UsersController extends BaseController
{
  public function index()
  {
    $userModel = new UserModel();
    $data['users'] = $userModel->getAllUsers();

    return view('admin/users/index', $data);
  }

  public function delete($userId)
  {
    $userModel = new UserModel();

    // Check if the user exists
    if (!$userModel->find($userId)) {
      return redirect()->back()->with('error', 'Utente non trovato.');
    }

    // Delete the user
    $userModel->delete($userId);

    return redirect()->back()->with('success', 'Utente cancellato.');
  }
}
