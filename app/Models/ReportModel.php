<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
  protected $table = 'reports';
  protected $primaryKey = 'id';
  protected $allowedFields = ['name', 'email', 'message', 'created_at'];

  public function getAllReports()
  {
    return $this->findAll();
  }
}
