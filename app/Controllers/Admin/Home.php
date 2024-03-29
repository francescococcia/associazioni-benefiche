<?php

namespace App\Controllers\Admin;

use App\Models\AssociationModel;
use App\Models\UserModel;
use App\Models\EventModel;
use App\Models\ReportModel;
use App\Controllers\BaseController;

class Home extends BaseController
{
  public function index()
  {
    $userModel = new UserModel();
    $associationModel = new AssociationModel();
    $eventModel = new EventModel();
    $reportModel = new ReportModel();

    $userId = session()->get('id');
    $userData = $userModel->find($userId);
    $session = session();
    $isLoggedIn = session()->get('isLoggedIn');
    $countAssociations = $associationModel->countAll();

    // Count the filtered users
    $countUsers = $userModel->getAllUsersCount();
    $countEvents = $eventModel->countAll();
    $countReports = $reportModel->countAll();

    $data['isLoggedIn'] = $isLoggedIn;
    $data['userData'] = $userData;
    $data['session'] = $session->get();
    $data['countAssociations'] = $countAssociations;
    $data['countUsers'] = $countUsers;
    $data['countEvents'] = $countEvents;
    $data['countReports'] = $countReports;

    return view('admin/dashboard', $data);
  }

  public function exit()
  {
    session()->destroy();
    return redirect()->to('/signin');
  }
}
