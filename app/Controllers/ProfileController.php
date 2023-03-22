<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\AssociationModel;


class ProfileController extends Controller
{
  public function index()
  {
    // Get the user data
    $userModel = new UserModel();
    $userId = session()->get('id');
    $userData = $userModel->find($userId);

    $associationsModel = new AssociationModel();
    // Build the query
    $query = $userModel->select('*')
    ->where('is_platform_manager', 1)
    ->get();

    // Get the results
    $associations = $query->getResult();
    // Pass the user data to the view
    $data = ['userData' => $userData];
    return view('Profile/index', $associations);
  }

}
