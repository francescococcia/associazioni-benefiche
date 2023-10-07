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

    return redirect()->back()->with('success', 'Segnalazione cancellata.');
  }
}
