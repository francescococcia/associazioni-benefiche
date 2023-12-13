<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\ParticipantModel;
use App\Models\AssociationModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use CodeIgniter\Controller;


class OrdersController extends Controller
{
  public function delete($productId)
  {
    helper('email_helper');
    $orderModel = new OrderModel();
    $productModel = new ProductModel(); // Add this line

    // $data = [
    //   'quantity' => $this->request->getVar('quantity'),
    // ];

    $quantity = $this->request->getVar('quantity');

    $userId = session()->get('id');

    $order = $orderModel->where('product_id', $productId)
                        ->where('user_id', $userId)
                        ->first();

    $product = $productModel->find($productId);

    // Check if the reservation exists
    if (!$order) {
        return redirect()->back()->with('error', 'Prenotazione non trovata.');
    }

    if ($quantity == $order['quantity']) {
      $dataProduct['quantity'] = $quantity + $product['quantity'];
      $orderModel->delete($order['id']);
      // $productModel->update($productId, $dataProduct);
  } elseif ($quantity < $order['quantity']) {
      // Se la quantità è minore, aggiorna le tabelle
      $newQuantity = $order['quantity'] - $quantity;
      $dataOrder['quantity'] = $newQuantity;
      $dataOrder['user_id'] = $userId;
      $dataOrder['product_id'] = $productId;
      // $dataProduct['quantity'] = $product['quantity'] + $quantity;
  
      $orderModel->update($order['id'], $dataOrder);
      // $productModel->update($productId, $dataProduct);
  }
  
  //email
    $userModel = new UserModel();
    $associationModel = new AssociationModel();

    $associationId = $this->request->getVar('association_id');

    $userData = $userModel->find($userId);
    $associationData = $associationModel->find($associationId);

    $platformId = $associationData['user_id'];
    $platformManager = $userModel->find($platformId);

    // Get the submitted form data

    // email user
    $firstName = $userData['first_name'];
    $email = $userData['email'];
    $to = $email;

    $subject = 'Conferma Rimozione Prenotazione Prodotto';

    $viewName = 'email/template/remove_book_product'; // This should match the name of your view file without the file extension
    $titleProduct = $product['name'];
    $data = [
      'firstName' => $firstName,
      'titleProduct' => $titleProduct,
      'quantity' => $quantity,
      'productName' => $product['name'],
      'productPrice' => $product['price'],
      'associationAddress' => $associationData['legal_address'],
      'nameAssociation' => $associationData['name'],
    ];

    sendMail($to, $subject, $viewName, $data);

    // platform manager
    $toManager = $platformManager['email'];
    $subjectManager = 'Rimozione Prenotazione Prodotto';

    $viewNameManager = 'email/template/remove_book_product_manager'; // This should match the name of your view file without the file extension
    $titleProduct = $product['name'];
    $dataManager = [
      'firstName' => $firstName,
      'titleProduct' => $titleProduct,
      'userEmail' => $userData['email'],
      'quantity' => $quantity,
      'productName' => $product['name'],
      'productPrice' => $product['price'],
      'associationAddress' => $associationData['legal_address'],
      'nameAssociation' => $associationData['name'],
    ];
    sendMail($toManager, $subjectManager, $viewNameManager, $dataManager);
    return redirect()->to('/cash')->with('success', 'Prenotazione annullata.');

}

}
