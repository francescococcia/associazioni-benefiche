<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class SignupController extends Controller
{
  public function index()
  {
    helper(['form']);
    $data = [];
    echo view('signup', $data);
  }

  public function index_association()
  {
    helper(['form']);
    $data = [];
    echo view('signup_association', $data);
  }

  public function store()
  {
    helper(['form']);
    helper('email_helper');
    $rules = [
      'first_name'          => 'required|min_length[2]|max_length[50]',
      'last_name'          => 'required|min_length[2]|max_length[50]',
      'phone_number'          => 'required|min_length[2]|max_length[50]',
      'birth_date'          => 'required|min_length[2]|max_length[50]',
      'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
      'password'      => 'required|min_length[4]|max_length[50]',
      'confirmpassword'  => 'matches[password]'
    ];

    if($this->validate($rules)){
      $userModel = new UserModel();

      $data = [
        'first_name'     => $this->request->getVar('first_name'),
        'last_name'     => $this->request->getVar('last_name'),
        'phone_number'     => $this->request->getVar('phone_number'),
        'birth_date'     => $this->request->getVar('birth_date'),
        'email'    => $this->request->getVar('email'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
      ];

      if($userModel->save($data)){
        $firstName = $this->request->getVar('first_name');
        $to = $this->request->getVar('email');
        $subject = 'Conferma Iscrizione';
        $message = 'Benvenuto ' . $firstName . ', clicca questo link per accedere http://localhost/associazioni-benefiche/signin';

        sendMail($to, $subject, $message);
        return redirect()->to('/signin')->with('success', 'Iscrizione effettuata!');
      }

    } else {
      $data['validation'] = $this->validator;
      echo view('signup', $data);
    }
  }
}
