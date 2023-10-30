<?php

namespace App\Models;

use CodeIgniter\Model;

class NewModel extends Model
{
  protected $table = 'news';
  protected $primaryKey = 'id';
  protected $allowedFields = [
    'association_id',
    'description',
    'created_at'
  ];

  public function getAllNewsByPlatformManager($associationId) {
    return $this->select('news.*')
        ->join('associations', 'news.association_id = associations.id')
        ->where('associations.id', $associationId)
        ->orderBy('news.id', 'DESC')
        ->findAll();
  }
}
