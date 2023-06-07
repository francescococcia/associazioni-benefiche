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
}
