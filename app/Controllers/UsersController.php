<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ReportModel;

class UsersController extends BaseController
{
  public function index()
  {
    return view('report');
  }

  public function new()
  {
    helper(['form']);
    $data = [];
    echo view('signup', $data);
  }

  public function create()
  {
    helper(['form']);
    helper('email_helper');
    $rules = [
      'first_name'          => 'required|max_length[50]',
      'last_name'          => 'required|max_length[50]',
      'phone_number'     => 'required|max_length[50]|regex_match[/^[0-9]+$/]',
      'birth_date'          => 'required|max_length[50]',
      'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
      'password'      => 'required|min_length[4]|max_length[50]',
      'confirmpassword'  => 'matches[password]'
    ];

    if($this->validate($rules)){
      $userModel = new UserModel();
      $activationToken = bin2hex(random_bytes(32));
      $data = [
        'first_name'     => $this->request->getVar('first_name'),
        'last_name'     => $this->request->getVar('last_name'),
        'phone_number'     => $this->request->getVar('phone_number'),
        'birth_date'     => $this->request->getVar('birth_date'),
        'email'    => $this->request->getVar('email'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        'activation_token' => $activationToken,
        'is_active' => false,
      ];

      $activationLink = base_url("/activate-account/{$activationToken}");


      if($userModel->save($data)){
        $firstName = $this->request->getVar('first_name');
        $to = $this->request->getVar('email');
        $subject = 'Conferma Iscrizione';

        $viewName = 'activation_template';
        $data = [
          'firstName' => $firstName,
          'activationLink' => $activationLink,
        ];

        sendMail($to, $subject, $viewName, $data);
        return redirect()->to('/signin')->with(
          'success',
          'Iscrizione effettuata. Controlla l\'email per attivare l\'account'
        );
      }

    } else {
      $data['validation'] = $this->validator;
      echo view('signup', $data);
    }
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
      return redirect()->back()->with('error', 'Email non trovata.');
    }

    // Generate a password reset token
    $token = bin2hex(random_bytes(16));


    $resetUrl = base_url("resetPassword/$token");

    if ( $userModel->update($user['id'], ['reset_token' => $token])) {
      $to = $user['email'];
      $subject = 'Reimposta Password';
      $message = 'Clicca sul seguente link per reimpostare la password: ' . $resetUrl;
      sendMailOld($to, $subject, $message);
      return redirect()->back()->with('success', 'Il link per la reimpostazione della password è stato inviato al vostro indirizzo e-mail.');
    } else {
        return redirect()->back()->with("error', 'Errore nell'invio della mail.")->withInput();
    }
  }
}
