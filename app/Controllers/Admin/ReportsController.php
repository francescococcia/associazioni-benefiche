<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ReportModel;

class ReportsController extends BaseController
{
  public function index()
  {
    $reportModel = new reportModel();
    $data['reports'] = $reportModel->findAll();

    return view('admin/reports/index', $data);
  }

  public function delete($reportId)
  {
    $reportModel = new ReportModel();

    // Check if the user exists
    if (!$reportModel->find($reportId)) {
      return redirect()->back()->with('error', 'Segnalazione non trovata.');
    }

    // Delete the user
    $reportModel->delete($reportId);

    return redirect()->back()->with('success', 'Segnalazione rimossa.');
  }

  public function readReport($reportId)
  {
    helper('email_helper');
    $reportModel = new ReportModel();

    // Check if the user exists
    if (!$reportModel->find($reportId)) {
      return redirect()->back()->with('error', 'Segnalazione non trovata.');
    }

    $reportData = [
      'is_read' => true,
    ];

    if($reportModel->update($reportId, $reportData)){
      $report = $reportModel->where('id', $reportId)->first();

      $email = $report['email'];
      $name = $report['name'];
      $to = $email;
      $subject = 'Feedback Segnalazione';

      $viewName = 'read_report_template'; // This should match the name of your view file without the file extension
      $data = [
        'name' => $name,
      ];
  
      sendMail($to, $subject, $viewName, $data);
  
      return redirect()->to('/admin/reports')->with(
        'success',
        'Feedback inviato'
      );
    }
  }
}
