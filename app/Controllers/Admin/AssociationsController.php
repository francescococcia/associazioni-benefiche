<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AssociationModel;

class AssociationsController extends BaseController
{
  public function index()
  {
    $associationModel = new AssociationModel();
    $data['associations'] = $associationModel->getAllAssociations();

    return view('admin/associations/index', $data);
  }

  public function delete($associationId)
  {
    $userModel = new UserModel();
    $associationModel = new AssociationModel();
    $association = $associationModel->find($associationId);

    if (!$association) {
      return redirect()->back()->with('error', 'Associazione non trovata.');
    }

    $userId = $association['user_id'];
    // Delete the user
    if ($associationModel->delete($associationId)) {
      // If the user is successfully deleted, then delete the association
      $userModel->delete($userId);
      return redirect()->back()->with('success', 'Associazione rimossa.');
    } else {
      return redirect()->back()->with('error', 'Errore nella rimozione dell\'associazione.');
    }
  }
}
