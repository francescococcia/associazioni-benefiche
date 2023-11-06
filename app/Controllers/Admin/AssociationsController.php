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

  public function edit($userId)
  {
    $associationModel = new AssociationModel();
    $userModel = new UserModel();

    $user = $userModel->where('id', $userId)->first();
    $association = $associationModel->where('user_id', $userId)->first();

    if (!$association) {
      return redirect()->to('/admin/associations')->with('error', 'Associazione non trovata.');
    }

    $data['user'] = $user;
    $data['association'] = $association;

    return view('associations/edit', $data);
  }

  public function update()
  {
    // Retrieve form data
    $userId = $this->request->getPost('user_id');
    $associationId = $this->request->getVar('association_id');

    // Check if the user has an association
    $associationModel = new AssociationModel();
    $association = $associationModel->find($associationId);

    if (!$association) {
        return redirect()->to('/admin/associations.')->with('error', 'Associazione non trovata.');
    }

    // Retrieve user and association data from the request
    $userData = [
        'email' => $this->request->getVar('email'),
        // Add other user fields here...
    ];

    $associationData = [
        'name' => $this->request->getVar('name'),
        'legal_address' => $this->request->getVar('legal_address'),
        'tax_code' => $this->request->getVar('tax_code'),
        'description' => $this->request->getVar('description'),
        'link' => $this->request->getVar('link'),
        // Add other association fields here...
    ];

    // Check and update the password
    $password = $this->request->getVar('password');
    if (!empty($password)) {
        $userData['password'] = password_hash($password, PASSWORD_DEFAULT);
    }

    // Update the image if provided
    $image = $this->request->getFile('image');
    if ($image->isValid() && !$image->hasMoved()) {
        // Handle image upload logic here...
    }

    // Update user and association data
    $userModel = new UserModel();
    $associationModel = new AssociationModel();

    $userModel->update($userId, $userData);
    $associationModel->update($associationId, $associationData);

    // Set success message and redirect
    session()->setFlashdata('success', 'Informazioni aggiornate.');
    return redirect()->to('/admin/associations');
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
