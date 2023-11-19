<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\ParticipantModel;
use App\Models\UserModel;
use CodeIgniter\Controller;


class OrdersController extends Controller
{
  public function delete($productId)
  {
    $orderModel = new OrderModel();

    $userId = session()->get('id');

    // Check if the user has a reservation for the specified event
    $order = $orderModel->where('product_id', $productId)
                        ->where('user_id', $userId)
                        ->first();

    // Check if the reservation exists
    if (!$order) {
        return redirect()->back()->with('error', 'Prenotazione non trovata.');
    }

    // Delete the reservation
    $orderModel->delete($order['id']);

    return redirect()->to('/cash')->with('success', 'Prenotazione annullata.');
  }
}
