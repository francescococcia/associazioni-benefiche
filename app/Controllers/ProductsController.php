<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EventModel;
use App\Models\ParticipantModel;
use App\Models\ProductModel;
use App\Models\AssociationModel;
use App\Models\OrderModel;

class ProductsController extends Controller
{
  protected $format = 'json';

  public function index()
  {
    $model = new ProductModel();
    if(session()->get('isPlatformManager')){
      $userId = session()->get('id');
      $data['products'] = $model->getAllProductsByPlatformManager($userId);
    } else {
      $data['products'] = $model->orderBy('id', 'DESC')->findAll();
    }
    return view('products/index', $data);
  }

  public function new($association_id = null)
  {
    helper(['form']);
    $userId = session()->get('id'); // get the ID of the currently logged-in user from the session
    // Load the user model
    $association_model = new AssociationModel();
    $associationId = $association_model->getUserWithAssociation($userId);
    $data['session'] = $associationId;
    echo view('products/new', ['association_id' => $associationId]);
  }

  public function create()
  {
    $data = [];
    $session = session();

    if ($this->request->getMethod() == 'post') {
      $rules = [
        'name' => 'required|min_length[3]|max_length[255]',
        'description' => 'required',
        'price' => 'required',
        'quantity' => 'required'
      ];

      if ($this->validate($rules)) {
        $model = new ProductModel();

        $data = [
          'association_id' => $this->request->getPost('association_id'),
          'name' => $this->request->getPost('name'),
          'description' => $this->request->getPost('description'),
          'price' => $this->request->getPost('price'),
          'quantity' => $this->request->getPost('quantity'),
        ];

        $model->save($data);
        $session->setFlashdata('message', 'Event created successfully!');
        return redirect()->to('/store');
      } else {
        $data['validation'] = $this->validator;
      }
    }
    $data = $session->get();
    $session->setFlashdata('msg', 'Errors.');
    return view('products/new', $data);
  }

  public function show($id) {
    $productModel = new ProductModel();
    $product = $productModel->find($id);

    if (!$product) {
      // Product not found, redirect or show error message
      return redirect()->to('store')->with('error', 'Product not found');
    }

    // Check if the quantity is available
    $isQuantityAvailable = $productModel->isQuantityAvailable($id, $product['quantity']);

    $data['product'] = $product;
    $data['isQuantityAvailable'] = $isQuantityAvailable;

    return view('products/show', $data);
  }

  public function buy()
  {
    // Load the ProductModel and OrderModel
    $productModel = new ProductModel();
    $orderModel = new OrderModel();

    // Get the logged-in user's ID
    $userId = session()->get('id');

    // Get the submitted form data
    $productId = $this->request->getPost('product_id');
    $quantity = $this->request->getPost('quantity');

    // Example: Save the order details to the "orders" table
    $data = [
      'user_id' => $userId,
      'product_id' => $productId,
      'quantity' => $quantity,
      'date' => date('Y-m-d H:i:s')
    ];

    $orderModel->insert($data);

    // Redirect to a success page or perform further actions
    return redirect()->to('/store')->with('message', 'Products bought successfully!');
  }

  public function cashDesk3(){
    // Get the selected products (e.g., from a shopping cart or session variable)
    $productModel = new ProductModel();
    $userId = session()->get('id'); // get the ID of the currently logged-in user from the session
    // Load the user model
    $association_model = new AssociationModel();
    $associationId = $association_model->getUserWithAssociation($userId);

    $selectedProducts = $productModel->checkProductsSell($associationId);

    // Retrieve the product details from the database using the ProductModel
    // $productModel = new ProductModel();
    // $products = [];

    // foreach ($selectedProducts as $productId) {
    //     $product = $productModel->find($productId);

    //     if ($product) {
    //         $products[] = $product;
    //     }
    // }

    // // Calculate the total price and quantity
    // $totalPrice = 0;
    // $totalQuantity = 0;

    // foreach ($products as $product) {
    //     $quantity = $_POST['quantity'][$product['id']]; // Adjust this based on your form field names
    //     $subtotal = $product['price'] * $quantity;

    //     $totalPrice += $subtotal;
    //     $totalQuantity += $quantity;
    // }

    // $data['products'] = $products;
    // $data['totalPrice'] = $totalPrice;
    // $data['totalQuantity'] = $totalQuantity;
    // $data['selectedProducts'] = $selectedProducts;


    // Load the checkout view
    return view('products/cash_desk', $selectedProducts);
  }
  
  public function cashDesk() {
    $productModel = new ProductModel();
    $association_model = new AssociationModel();

    $selectedProducts = $productModel->checkProductsSell();

    $data['selectedProducts'] = $selectedProducts;

    return view('products/cash_desk', $data);
}




  // public function update($id = null)
  // {
  //     $model = new ProductsModel();
  //     $data = $this->request->getJSON();
  //     if ($model->update($id, $data)) {
  //         $response = [
  //             'status' => 200,
  //             'error' => null,
  //             'message' => [
  //                 'success' => 'Product updated successfully'
  //             ]
  //         ];
  //         return $this->respond($response);
  //     }
  //     else {
  //         $response = [
  //             'status' => 500,
  //             'error' => 'validation_error',
  //             'message' => [
  //                 'error' => $model->errors()
  //             ]
  //         ];
  //         return $this->respond($response);
  //     }
  // }

  // public function delete($id = null)
  // {
  //     $model = new ProductsModel();
  //     if ($model->delete($id)) {
  //         $response = [
  //             'status' => 200,
  //             'error' => null,
  //             'message' => [
  //                 'success' => 'Product deleted successfully'
  //             ]
  //         ];
  //         return $this->respondDeleted($response);
  //     }
  //     else {
  //         $response = [
  //             'status' => 500,
  //             'error' => 'validation_error',
  //             'message' => [
  //                 'error' => $model->errors()
  //             ]
  //         ];
  //         return $this->respond($response);
  //     }
  // }
}
