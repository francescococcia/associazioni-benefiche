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
    $rules = [
      'first_name'          => 'required|min_length[2]|max_length[50]',
      'last_name'          => 'required|min_length[2]|max_length[50]',
      'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
      'password'      => 'required|min_length[4]|max_length[50]',
      'confirmpassword'  => 'matches[password]'
    ];
      
    if($this->validate($rules)){
      $userModel = new UserModel();

      $data = [
        'first_name'     => $this->request->getVar('first_name'),
        'last_name'     => $this->request->getVar('last_name'),
        'email'    => $this->request->getVar('email'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
      ];

      $userModel->save($data);

      return redirect()->to('/signin');
    }else{
      $data['validation'] = $this->validator;
      echo view('signup', $data);
    }
  }

  public function store_association()
  {
    helper(['form']);
    $rules = [
      'first_name'          => 'required|min_length[2]|max_length[50]',
      'head_office'          => 'required|min_length[2]|max_length[50]',
      'tax_code'          => 'required|min_length[2]|max_length[50]',
      'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
      'password'      => 'required|min_length[4]|max_length[50]',
      'confirmpassword'  => 'matches[password]'
    ];
      
    if($this->validate($rules)){
      $userModel = new UserModel();

      $data = [
        'first_name'     => $this->request->getVar('first_name'),
        'head_office'    => $this->request->getVar('head_office'),
        'tax_code'    => $this->request->getVar('tax_code'),
        'email'    => $this->request->getVar('email'),
        'is_responsible'    => $this->request->getVar('is_responsible'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
      ];

      $userModel->save($data);

      return redirect()->to('/signin');
    }else{
      $data['validation'] = $this->validator;
      echo view('signup', $data);
    }
  }
}
