<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('Home/index');
    }
    // public function indexAction()
    // {
    //     View::renderTemplate('Home/index.html');
    // }

}
