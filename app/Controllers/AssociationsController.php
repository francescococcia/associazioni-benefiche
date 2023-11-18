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
    // Assuming you have a model named AssociationModel
    $associationModel = new AssociationModel();
    $eventModel = new EventModel();
    $productModel = new ProductModel();
    $newModel = new NewModel();

    $association = $associationModel->find($id);

    if (!$association) {
      // Handle case when association with the given ID is not found
      return redirect()->to('/associations')->with('error', 'Association not found.');
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

  public function create()
  {
    return view('associations/create');
  }

  public function store()
  {
    $request = service('request');
    $response = service('response');

    // Get the uploaded file
    $file = $request->getFile('image');

    // Check if a file was uploaded
    if ($file && $file->isValid()) {
        // Configure the upload settings
        $config = [
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|jpeg|png',
            'max_size' => 2048, // Maximum file size in kilobytes
            'encrypt_name' => true, // Encrypt the uploaded file name
        ];

        // Move the uploaded file to the destination directory
        if ($file->move($config['upload_path'], $file->getRandomName())) {
            // File upload was successful
            $filename = $file->getName();

            // Save the file information to the database
            $associationModel = new AssociationModel();
            $associationData = [
                'description' => $request->getPost('description'),
                'image' => $filename,
            ];
            $associationModel->insert($associationData);

            // Redirect to a success page or perform further actions
            return redirect()->to('/associations')->with('success', 'Image uploaded successfully!');
        } else {
            // File upload failed
            $error = $file->getErrorString();
            // Handle the error
            return redirect()->back()->with('error', 'File upload failed: ' . $error);
        }
    }

    // No file uploaded or invalid file
    return redirect()->back()->with('error', 'No valid file uploaded.');
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

  public function submitReport()
  {
    $reportModel = new ReportModel();

    // Get the submitted report data
    $name = $this->request->getPost('name');
    $email = $this->request->getPost('email');
    $message = $this->request->getPost('message');

    // Create an array of data to be inserted into the "reports" table
    $data = [
        'name' => $name,
        'email' => $email,
        'message' => $message,
        'created_at' => date('Y-m-d H:i:s'),
    ];

    // Insert the data into the "reports" table
    $reportModel->insert($data);

    // Set a flash message to indicate success
    $session = session();
    $session->setFlashdata('success', 'Report submitted successfully.');

    // Redirect to the thank you page or any other desired page
    return redirect()->to('/dashboard');
  }
}
