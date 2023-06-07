<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\AssociationModel;


class DashboardController extends Controller
{
  public function index()
  {
    // Get the user data
    $userModel = new UserModel();
    $userId = session()->get('id');
    $userData = $userModel->find($userId);

    $platformManagers = $userModel->getAllAssociationsWithPlatformManagers();
    // Pass the user data to the view
    $data = ['userData' => $userData, 'platformManagers' => $platformManagers];
    return view('dashboard/index', $data);
  }
}
