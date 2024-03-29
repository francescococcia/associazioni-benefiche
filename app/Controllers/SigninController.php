<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;


class SigninController extends Controller
{
  public function index()
  {
    helper(['form']);
    echo view('signin');
  }

  public function loginAuth()
  {
    $session = session();

    $userModel = new UserModel();

    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    $data = $userModel->where('email', $email)->first();

    if($data){
      if($data['is_active']){
        $pass = $data['password'];
        $authenticatePassword = password_verify($password, $pass);
        if($authenticatePassword){
          $ses_data = [
            'id' => $data['id'],
            'first_name' => $data['first_name'],
            'email' => $data['email'],
            'isLoggedIn' => TRUE
          ];


          // Check if the user is an admin
          if ($data['is_admin']) {
            // Redirect to the admin dashboard or any other admin page
            $ses_data['isAdmin'] = TRUE;
            $session->set($ses_data);
            return redirect()->to('/admin/dashboard');
          }

          if ($data['is_platform_manager']) {
            $ses_data['isPlatformManager'] = TRUE;
          }

          $session->set($ses_data);

          return redirect()->to('/');

        }else{
          $session->setFlashdata('msg', 'Password non corretta.');
          return redirect()->to('/signin');
        }
      } else{
        $session->setFlashdata('msg', "Utente non attivato");
        return redirect()->to('/signin');
      }
    } else {
      $session->setFlashdata('msg', "Utente non trovato");
      return redirect()->to('/signin');
    }
  }

  public function signout(){
    return redirect()->to('/signin');
  }

  public function destroy()
    {
      AuthGuard::logout();
      return redirect()->to('/signin');

    }
}
