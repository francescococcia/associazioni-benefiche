<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AssociationModel;

class AssociationsController extends BaseController
{
  public function index()
  {
    $userModel = new UserModel();
    $associationModel = new AssociationModel();
    $data['associations'] = $associationModel->getAllAssociations();

    return view('admin/associations/index', $data);
  }
}
