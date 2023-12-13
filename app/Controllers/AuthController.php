<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use CodeIgniter\Validation\Rules;

class AuthController extends Controller
{

  public function activateAccount($token)
  {
    $userModel = new UserModel();
    $user = $userModel->findByActivationToken($token);

    if ($user) {
        // Activate the user's account
        $data = [
            'activation_token' => null, // Set the activation token to null or any other value to mark it as activated
            'is_active' => true, // Set a field to indicate that the account is active
        ];

        $userModel->update($user['id'], $data);

        return redirect()->to('/signin')->with('success', 'Il tuo account è stato attivato.');
    } else {
        return redirect()->to('/signin')->with('error', 'Token non valido.');
    }
  }

    public function resetPassword($token)
    {
        // Check if the token is valid and not expired
        $userModel = new UserModel();
        $user = $userModel->where('reset_token', $token)->first();
        $data['user'] = $user;
        if (!$user) {
            // Token is invalid
            // You can handle this case by displaying an error message
        } else {
            // Token is valid
            echo view('reset_password',$data);
        }
    }

    public function recoverPassword()
    {
        $userModel = new UserModel();
        $session = session();

        $token = $this->request->getVar('token'); // Use 'token' instead of 'reset_token'
        $password = $this->request->getVar('password');
        $confirmPassword = $this->request->getVar('confirm_password');

        // Check if the token exists and matches a user
        $user = $userModel->where('reset_token', $token)->first();

        if (!$user) {
            return redirect()->to('/signin')->with('error', 'Token scaduto.');
        }

        // Check if the password and confirm_password match
        if ($password !== $confirmPassword) {
            return redirect()->back()->with('error', 'Password non coincide.');
        }

        // Hash the new password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Update the user's password
        $userModel->update($user['id'], ['password' => $hashedPassword]);

        $session->setFlashdata('success', 'Password aggiornata.');
        return redirect()->to('/signin');
    }
}
