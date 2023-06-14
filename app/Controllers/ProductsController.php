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
    $data['products'] = $model->orderBy('id', 'DESC')->findAll();
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

  public function show($id)
  {
    $model = new ProductModel();
    $product = $model->find($id);

    if (!$product) {
        // Product not found, redirect or show error message
        return redirect()->to('store')->with('error', 'Product not found');
    }

    $data['product'] = $product;
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
    $productIds = $this->request->getPost('product_id');
    $quantities = $this->request->getPost('quantity');

    // Process each product
    foreach ($productIds as $productId) {
        // Retrieve the quantity for the current product
        $quantity = $quantities[$productId];

        // Perform your desired actions with the product and quantity
        // For example, you can save the product and quantity to the database or add them to the shopping cart

        // Example: Save the order details to the "orders" table
        $data = [
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity,
            'date' => date('Y-m-d H:i:s')
        ];

        $orderModel->insert($data);
      }

      // Redirect to a success page or perform further actions
      return redirect()->to('/store')->with('message', 'Products bought successfully!');
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
