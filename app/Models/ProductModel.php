<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
  protected $table = 'products';
  protected $primaryKey = 'id';
  protected $allowedFields = [
    'association_id',
    'name',
    'description',
    'price',
    'quantity'
  ];
}
