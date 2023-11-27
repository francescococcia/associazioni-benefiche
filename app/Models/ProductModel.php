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
    'quantity',
    'image',
  ];

  public function quantityAvailable($productId, $quantity) {
    $builder = $this->db->table('orders');
    $builder->select('SUM(quantity) as total_quantity');
    $builder->where('product_id', $productId);
    $query = $builder->get();
    $row = $query->getRow();

    $totalQuantity = $row->total_quantity ?? 0; // Total quantity ordered for the specified user and product
    if($quantity > $totalQuantity){
      return $quantity - $totalQuantity;
    } else {
      return 0;
    }
  }

  public function checkProductsSell() {
    $builder = $this->db->table('orders')
      ->select('associations.name as association_name, SUM(products.price * orders.quantity) as total_price')
      ->join('products', 'orders.product_id = products.id', 'inner')
      ->join('associations', 'products.association_id = associations.id', 'inner')
      ->groupBy('associations.id');

    $query = $builder->get();
    $result = $query->getResultArray();

    return $result;
  }


  public function isQuantityAvailable($productId, $quantity) {
    $builder = $this->db->table('orders');
    $builder->select('SUM(quantity) as total_quantity');
    $builder->where('product_id', $productId);
    $query = $builder->get();
    $row = $query->getRow();

    $totalQuantity = $row->total_quantity ?? 0; // Total quantity ordered for the specified user and product
    if($quantity > $totalQuantity){
      return $quantity - $totalQuantity;
    } else {
      return 0;
    }
  }


  public function getAllProductsByPlatformManager($userId) {
    return $this->select('products.*')
        ->join('associations', 'products.association_id = associations.id')
        ->where('associations.user_id', $userId)
        ->orderBy('products.id', 'DESC')
        ->findAll();
  }

  public function getAllProductsByPlatformManagerPaginate($userId) {
    return $this->select('products.*')
        ->join('associations', 'products.association_id = associations.id')
        ->where('associations.user_id', $userId)
        ->orderBy('products.id', 'DESC');
  }

  public function getCartProductsyUserId($userId)
  {
    $builder = $this->db->table('products');
    $builder->select('products.*');
    $builder->join('orders', 'products.id = orders.product_id');
    $builder->where('orders.user_id', $userId);

    return $builder->get()->getResultArray();
  }

  public function getCartProductsByUserIdAndProductId($userId, $productId)
  {
    $builder = $this->db->table('products');
    $builder->select('products.*');
    $builder->join('orders', 'products.id = orders.product_id');
    $builder->where('orders.user_id', $userId);
    $builder->where('orders.product_id', $productId);

    return $builder->get()->getResultArray();
  }

  public function getBookedProductCount($userId, $productId)
  {
    $builder = $this->db->table('orders');
    $builder->selectSum('quantity', 'bookedCount');
    $builder->where('user_id', $userId);
    $builder->where('product_id', $productId);

    $result = $builder->get()->getRow();

    return $result ? (int)$result->bookedCount : 0;
  }
}
