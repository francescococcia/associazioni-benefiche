<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TeamModel;

class TeamController extends BaseController
{
  public function index()
  {
    $teamModel = new TeamModel();
    $data['teams'] = $teamModel->findAll();

    return view('chi_siamo', $data);
  }
}
