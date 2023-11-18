<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\AssociationModel;

class SignupAssociationController extends Controller
{
  public function index()
  {
    helper(['form']);
    $data = [];
    echo view('signup_association', $data);
  }

  public function store()
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

      // Upload the image file
      // $image = $this->request->getFile('image');
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

          // $imagePath = $image->getName();
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

          $viewName = 'activation_template'; // This should match the name of your view file without the file extension
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
}
