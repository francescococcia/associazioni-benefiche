<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\ParticipantModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use CodeIgniter\Controller;


class OrdersController extends Controller
{
  public function delete($productId)
{
    $orderModel = new OrderModel();
    $productModel = new ProductModel(); // Add this line

    $data = [
      'quantity' => $this->request->getVar('quantity'),
    ];
    
    $quantity = $this->request->getVar('quantity');

    $userId = session()->get('id');

    $order = $orderModel->where('product_id', $productId)
                        ->where('user_id', $userId)
                        ->first();

    // Check if the reservation exists
    if (!$order) {
        return redirect()->back()->with('error', 'Prenotazione non trovata.');
    }

    if ($quantity == $order['quantity']) {
        // Delete the reservation
        $orderModel->delete($order['id']);
        return redirect()->to('/cash')->with('success', 'Prenotazione annullata.');
    } elseif ($quantity < $order['quantity']) {
        $newQuantity = $order['quantity'] - $quantity;
        $data['quantity'] = $newQuantity;
        $orderModel->update($order['id'], $data); // Use $productModel to update the quantity
        return redirect()->to('/cash')->with('success', 'Prenotazione annullata.');
    }
}

}
