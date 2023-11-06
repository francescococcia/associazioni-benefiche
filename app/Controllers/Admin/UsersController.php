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

  public function edit($userId)
  {
    $userModel = new UserModel();
    $userData = $userModel->find($userId);

    // Pass the user data to the view
    $data['userData'] = $userData;

    return view('users/edit', $data);
  }

  public function update()
  {
    $userId = $this->request->getPost('user_id');

    // Get other form fields
    $email = $this->request->getPost('email');
    $first_name = $this->request->getPost('first_name');
    $last_name = $this->request->getPost('last_name');
    // ... (get other fields)

    // Update the user information in the database
    $userModel = new UserModel();

    // Assuming $userData is an array with the updated fields
    $userData = [
        'email' => $email,
        'first_name' => $first_name,
        'last_name' => $last_name,
        // ... (add other fields)
    ];

    $userModel->update($userId, $userData);

    // Redirect after the update
    return redirect()->to('/admin/users')->with('success', 'Informazioni aggiornate.');
  }


  public function delete($userId)
  {
    $userModel = new UserModel();

    // Check if the user exists
    if (!$userModel->find($userId)) {
      return redirect()->back()->with('error', 'Utente non registrato.');
    }

    // Delete the user
    $userModel->delete($userId);

    return redirect()->back()->with('success', 'Utente rimosso.');
  }
}
