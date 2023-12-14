<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AssociationModel;
use App\Models\EventModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\NewModel;

use CodeIgniter\Files\UploadedFile;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;


class AssociationsController extends BaseController
{
  public function show($id)
  {
    helper('date');
    $associationModel = new AssociationModel();
    $eventModel = new EventModel();
    $productModel = new ProductModel();
    $newModel = new NewModel();

    $association = $associationModel->find($id);

    if (!$association) {
      // Handle case when association with the given ID is not found
      return redirect()->to('/associations')->with('error', 'Associazione non trovata.');
    }

    $userId = $association['user_id'];

    // Pass the association data to the view
    $data['association'] = $association;
    $data['userId'] = $userId;
    $data['events'] = $eventModel->getAllEventsByPlatformManager($userId);
    $data['products'] = $productModel->getAllProductsByPlatformManager($userId);
    $data['news'] = $newModel->getAllNewsByPlatformManager($association['id']);

    return view('associations/show', $data);
  }

  public function new()
  {
    helper(['form']);
    $data = [];
    echo view('signup_association', $data);
  }

  public function create()
  {
    helper(['form']);
    helper('email_helper');
    $activationToken = bin2hex(random_bytes(32));
    $rules = [
      'name'          => 'required|max_length[50]',
      'legal_address'   => 'required|max_length[50]',
      'tax_code'      => 'required|max_length[50]',
      'email'         => 'required|valid_email|is_unique[users.email]',
      'password'      => 'required|min_length[4]|max_length[50]',
      'confirmpassword'  => 'matches[password]'
    ];

    if ($this->validate($rules)) {
      $userModel = new UserModel();
      $associationModel = new AssociationModel();

      $userData = [
        'email'    => $this->request->getVar('email'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        'is_admin' => false,
        'is_platform_manager' => true,
        'activation_token' => $activationToken,
        'is_active' => false,
      ];

      $userId = $userModel->insert($userData);


      $file = $this->request->getFile('image');

      if ($file && $file->isValid()) {
        // Configure the upload settings
        $config = [
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|jpeg|png',
            'max_size' => 2048, // Maximum file size in kilobytes
            'encrypt_name' => true, // Encrypt the uploaded file name
        ];

        // Create the upload directory if it doesn't exist
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }

        // Move the uploaded file to the destination directory
        $uniqueId = uniqid(); // You can use any method to generate a unique identifier
        $activationLink = base_url("/activate-account/{$activationToken}");

        if ($file->move($config['upload_path'], $uniqueId . '_' . $file->getRandomName())) {

          $filename = $file->getName();

          // Save the image path to the database
          $associationData = [
              'name' => $this->request->getVar('name'),
              'user_id' => $userId,
              'legal_address' => $this->request->getVar('legal_address'),
              'tax_code' => $this->request->getVar('tax_code'),
              'description' => $this->request->getVar('description'),
              'link' => $this->request->getVar('link'),
              'office' => $this->request->getVar('office'),
              'image' => $filename, // Salva solo il nome del file senza l'identificatore
          ];

          $associationModel->insert($associationData);

          $name = $this->request->getVar('name');
          $to = $this->request->getVar('email');
          $subject = 'Conferma Iscrizione';

          $viewName = 'activation_template';
          $data = [
            'firstName' => $name,
            'activationLink' => $activationLink,
          ];

          sendMail($to, $subject, $viewName, $data);

          return redirect()->to('/signin')->with(
            'success',
            "Associazione creata. Controlla l'email per attivare l'account."
          );
        } else {
          // File upload failed
          $error = $image->getErrorString();
          // Handle the error
          return redirect()->back()->with('error', 'File upload failed: ' . $error);
        }
      }
    } else {
      $data['validation'] = $this->validator;
      echo view('signup-association', $data);
    }
  }

  public function edit()
  {
    $userId = session()->get('id');
    $associationModel = new AssociationModel();
    $userModel = new UserModel();

    $user = $userModel->where('id', $userId)->first();
    $association = $associationModel->where('user_id', $userId)->first();

    if (!$association) {
      return redirect()->to('/associations')->with('error', 'Association not found');
    }

    $data['user'] = $user;
    $data['association'] = $association;

    return view('associations/edit', $data);
  }

  public function update()
  {
    $session = session();
    $userId = session()->get('id');
    $associationModel = new AssociationModel();
    $userModel = new UserModel();

    $association = $associationModel->where('user_id', $userId)->first();

    if (!$association) {
      return redirect()->to('/dashboard')->with('error', 'Association not found');
    }

    $userData = [
      'email'    => $this->request->getVar('email'),
    ];

    $password = $this->request->getVar('password');

    // Update the password if provided
    if (!empty($password)) {
      $userData['password'] = password_hash($password, PASSWORD_DEFAULT);
    }

    $associationData = [
      'name' => $this->request->getVar('name'),
      'legal_address' => $this->request->getVar('legal_address'),
      'tax_code' => $this->request->getVar('tax_code'),
      'description' => $this->request->getVar('description'),
      'link' => $this->request->getVar('link'),
      'office' => $this->request->getVar('office'),
    ];

    // Upload the image file
    $image = $this->request->getFile('image');

    if ($image->isValid() && !$image->hasMoved()) {
      // Configure the upload settings
      $config = [
          'upload_path' => './uploads/',
          'allowed_types' => 'gif|jpg|jpeg|png',
          'max_size' => 2048, // Maximum file size in kilobytes
          'encrypt_name' => true, // Encrypt the uploaded file name
      ];

      // Create the upload directory if it doesn't exist
      if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0777, true);
      }

      // Move the uploaded file to the destination directory
      $uniqueId = uniqid(); // You can use any method to generate a unique identifier
      if ($image->move($config['upload_path'], $uniqueId . '_' . $image->getName())) {

        $imagePath = $image->getName();

        // Save the image path to the database
        $associationData = [
          'image' => $image->getName(), // Salva solo il nome del file senza l'identificatore
        ];

      } else {
        // File upload failed
        $error = $image->getErrorString();
        // Handle the error
        return redirect()->back()->with('error', 'Errore nel caricamento dell\'immagine: ' . $error);
      }
    }

    $userModel->update($userId, $userData);

    $associationModel->update($association['id'], $associationData);

    $session->setFlashdata('success', 'Informazioni aggiornate.');

    return redirect()->to('/profile-manager');
  }
}
