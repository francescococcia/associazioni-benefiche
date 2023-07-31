<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AssociationModel;
use CodeIgniter\Files\UploadedFile;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;


class AssociationsController extends BaseController
{
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
    $associationData = $associationModel->getUserWithAssociation($userId);

    // Pass the association data to the view
    $data['associationData'] = $associationData;

    return view('associations/edit', $data);
  }

  public function update()
  {
    $associationModel = new AssociationModel();
    $session = session();
    $userId = $session->get('id');
    $associationData = $associationModel->getUserWithAssociation($userId);

    // Validate the input
    // $validationRules = [
    //     'email' => 'required|valid_email',
    //     'first_name' => 'required',
    //     'last_name' => 'required',
    //     'phone_number' => 'required',
    //     'birth_date' => 'required',
    //     'password' => 'matches[confirm_password]'
    // ];
    // if (!$this->validate($validationRules)) {
    //     $validationErrors = $this->validator->getErrors();
    //     return redirect()->back()->withInput()->with('errors', $validationErrors);
    // }

    $name = $this->request->getVar('name');
    // $first_name = $this->request->getVar('first_name');
    // $last_name = $this->request->getVar('last_name');
    // $phone_number = $this->request->getVar('phone_number');
    // $birth_date = $this->request->getVar('birth_date');
    // $password = $this->request->getVar('password');

    // Update the association data
    $associationData = [
        'name' => $name,
        // 'first_name' => $first_name,
        // 'last_name' => $last_name,
        // 'phone_number' => $phone_number,
        // 'birth_date' => $birth_date
    ];

    // Update the password if provided
    if (!empty($password)) {
        $associationData['password'] = password_hash($password, PASSWORD_DEFAULT);
    }

    $associationModel->update($associationId, $associationData);

    // Set the success message
    $session->setFlashdata('success', 'Association updated successfully.');

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

  public function forgotPassword()
  {
    helper(['form']);
    echo view('forgot_password');
  }

  public function sendForgotPassword()
  {
    // Get the association's email from the form input
    $email = $this->request->getPost('email');

    // Check if the email exists in the database
    $associationModel = new AssociationModel();
    $association = $associationModel->where('email', $email)->first();

    if (!$association) {
      // Association does not exist
      return redirect()->back()->with('error', 'Email not found.');
    }

    // Generate a password reset token
    $token = bin2hex(random_bytes(16));

    // Save the token in the association's record in the database
    $associationModel->update($association['id'], ['reset_token' => $token]);

    // Create the password reset URL
    $resetUrl = base_url('reset-password?token=' . $token);

    // Send the password reset email
    $to = $association['email'];
    $subject = 'Password Reset';
    $message = 'Click the following link to reset your password: ' . $resetUrl;

    if (send_email($to, $subject, $message)) {
        return redirect()->back()->with('success', 'Password reset link has been sent to your email.');
    } else {
        return redirect()->back()->with('error', 'Failed to send password reset email.')->withInput();
    }
  }
}
