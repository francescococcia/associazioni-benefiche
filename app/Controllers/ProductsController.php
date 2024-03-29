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

  public function edit($id)
  {
    $productModel = new ProductModel();
    $product = $productModel->where('id', $id)->first();

    if (!$product) {
      return redirect()->to('/store')->with('error', 'Prodotto non trovato');
    }

    $data['product'] = $product;

    return view('products/edit', $data);
  }

  public function update()
  {
    $session = session();
    $productModel = new ProductModel();
    $productId = $this->request->getVar('product_id');
    $product = $productModel->where('id', $productId)->first();

    if (!$product) {
      return redirect()->to('/store')->with('error', 'Evento non trovato');
    }

    $data = [
      'name' => $this->request->getVar('name'),
      'description' => $this->request->getVar('description'),
      'price' => $this->request->getVar('price'),
      'quantity' => $this->request->getVar('quantity'),
    ];

      $productModel->update($product['id'], $data);

      $session->setFlashdata('success', 'Informazioni aggiornate.');

    return redirect()->to('/product/edit/'.$product['id']);
  }

  public function buy()
  {
    helper('url');
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
    return redirect()->to('product/detail/' . $productId);
    // return redirect()->to('/products/detail/'.$productId)->with('message', 'Products bought successfully!');
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

  public function delete($id)
  {
    // Create instances of the EventModel and ParticipantModel
    $productModel = new ProductModel();

    // Find the event by its ID
    $product = $productModel->find($id);

    // Check if the event exists
    if (!$product) {
        // Event not found, redirect or show an error message
        return redirect()->back()->with('error', 'Prodotto non trovato.');
    }

    // Delete the associated participants
    $productModel->where('id', $id)->delete();

    // Delete the event
    $productModel->delete($id);

    // Redirect or show a success message
    return redirect()->to('/store')->with('success', 'Prodotto cancellato.');
  }
}
