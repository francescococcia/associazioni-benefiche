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

  public function isQuantityAvailable($userId, $productId, $quantity) {
    $builder = $this->db->table('orders');
    $builder->select('SUM(quantity) as total_quantity');
    $builder->where('user_id', $userId);
    $builder->where('product_id', $productId);
    $query = $builder->get();
    $row = $query->getRow();

    $totalQuantity = $row->total_quantity ?? 0; // Total quantity ordered for the specified user and product
    if($quantity > $totalQuantity){
      return $quantity;
    }
    return $totalQuantity;
  }
  // public function isQuantityAvailable($productId, $quantity)
  //   {
  //       $product = $this->find($productId);

  //       if (!$product) {
  //           // Product not found
  //           return false;
  //       }

  //       // Get the total quantity ordered for the given product
  //       $orderModel = new OrderModel();
  //       $totalOrderedQuantity = $orderModel->where('product_id', $productId)->sum('quantity');

  //       // Calculate the available quantity
  //       $availableQuantity = $product['quantity'] - $totalOrderedQuantity;

  //       return $availableQuantity >= $quantity;
  //   }
  
}
