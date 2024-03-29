<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ReportModel;

class UsersController extends BaseController
{
  public function index()
  {
    // $report = $this->request->getPost('report');

    // Save the report to the database or perform any other necessary actions

    // Optionally, you can show a success message or redirect to a confirmation page
    // return redirect()->to('/submitReport');
    return view('report');
  }

  public function edit()
  {
    $userId = session()->get('id');
    $userModel = new UserModel();
    $userData = $userModel->find($userId);

    // Pass the user data to the view
    $data['userData'] = $userData;

    return view('users/edit', $data);
  }

  public function update()
  {
    $userModel = new UserModel();
    $session = session();
    $userId = $session->get('id');

    // Validate the input
    $validationRules = [
        'email' => 'required|valid_email',
        'first_name' => 'required',
        'last_name' => 'required',
        'phone_number' => 'required',
        'birth_date' => 'required',
        'password' => 'matches[confirm_password]'
    ];
    if (!$this->validate($validationRules)) {
        $validationErrors = $this->validator->getErrors();
        return redirect()->back()->withInput()->with('errors', $validationErrors);
    }

    $email = $this->request->getVar('email');
    $first_name = $this->request->getVar('first_name');
    $last_name = $this->request->getVar('last_name');
    $phone_number = $this->request->getVar('phone_number');
    $birth_date = $this->request->getVar('birth_date');
    $password = $this->request->getVar('password');

    // Update the user data
    $userData = [
        'email' => $email,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'phone_number' => $phone_number,
        'birth_date' => $birth_date
    ];

    // Update the password if provided
    if (!empty($password)) {
        $userData['password'] = password_hash($password, PASSWORD_DEFAULT);
    }

    $userModel->update($userId, $userData);

    // Set the success message
    $session->setFlashdata('success', 'Informazioni aggiornate.');

    return redirect()->to('/profile');
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
    helper('email_helper');
    // Get the user's email from the form input
    $email = $this->request->getPost('email');

    // Check if the email exists in the database
    $userModel = new UserModel();
    $user = $userModel->where('email', $email)->first();

    if (!$user) {
      // User does not exist
      return redirect()->back()->with('error', 'Email not found.');
    }

    // Generate a password reset token
    $token = bin2hex(random_bytes(16));

    // Save the token in the user's record in the database
    // $userModel->update($user['id'], ['reset_token' => $token]);

    // Create the password reset URL
    // $resetUrl = base_url('reset-password?token=' . $token);
    $resetUrl = base_url("resetPassword/$token");

    if ( $userModel->update($user['id'], ['reset_token' => $token])) {
      $to = $user['email'];
      $subject = 'Reimposta Password';
      $message = 'Clicca sul seguente link per reimpostare la password: ' . $resetUrl;
      sendMail($to, $subject, $message);
      return redirect()->back()->with('success', 'Il link per la reimpostazione della password è stato inviato al vostro indirizzo e-mail.');
    } else {
        return redirect()->back()->with("error', 'Errore nell'invio della mail.")->withInput();
    }
  }
}
