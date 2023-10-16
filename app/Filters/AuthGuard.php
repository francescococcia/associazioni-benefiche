<?php 

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class AuthGuard implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if (!session()->get('isLoggedIn'))
    {
      return redirect()->to('/signin')->with(
        'info',
        "Per visualizzare la pagina bisogna effettuare prima l'accesso."
      );;
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
      
  }
}