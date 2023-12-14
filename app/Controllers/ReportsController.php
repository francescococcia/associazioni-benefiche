<?php

namespace App\Controllers;

use App\Models\ReportModel;

class ReportsController extends BaseController
{
  public function create()
  {
    return view('reports/index');
  }


  public function store()
  {
    // Create a new instance of the ReportModel
    $reportModel = new ReportModel();

    // Prepare the data to be inserted
    $data = [
      'name' => $this->request->getPost('name'),
      'email' => $this->request->getPost('email'),
      'message' => $this->request->getPost('message'),
      'is_read' => false,
      'created_at' => date('Y-m-d H:i:s')
    ];

    // Insert the data into the database
    $reportModel->insert($data);
    $session = session();

    return redirect()->to('/')->with('success', 'Segnalazione inviata.');
  }
}
