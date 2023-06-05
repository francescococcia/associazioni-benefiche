<?php

namespace App\Controllers;

use App\Models\ReportModel;

class ReportsController extends BaseController
{
  public function create()
    {
        return view('report');
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
          'created_at' => date('Y-m-d H:i:s')
      ];

        // Insert the data into the database
        $reportModel->insert($data);

        // Redirect to a success page or display a success message
        return redirect()->to('/profile')->with('success', 'Report submitted successfully');
    }
}
