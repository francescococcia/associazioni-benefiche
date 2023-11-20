<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EventModel;
use App\Models\ParticipantModel;
use App\Models\ProductModel;
use App\Models\AssociationModel;
use App\Models\OrderModel;
use App\Models\UserModel;

class ProductsController extends Controller
{

  public function index()
  {
    $model = new ProductModel();
    $userId = session()->get('id');

    $perPage = 12; // Number of items per page

    $query = $model->orderBy('id', 'DESC'); // Your original query

    $data['products'] = $query->paginate($perPage); // Apply pagination
    $data['pager'] = $model->pager; // Store the pager

    foreach ($data['products'] as $key => $product) {
      $data['products'][$key]['quantityAvailable'] = $model->quantityAvailable($product['id'], $product['quantity']);
    }
    return view('products/index', $data);
  }

  public function index_manager()
  {
    $model = new ProductModel();
    $userId = session()->get('id');

    $perPage = 12; // Number of items per page

    $query = $model->getAllProductsByPlatformManagerPaginate($userId); // Modified method

    $data['products'] = $query->paginate($perPage); // Apply pagination
    $data['pager'] = $model->pager; // Include the pager information


    foreach ($data['products'] as $key => $product) {
      $data['products'][$key]['quantityAvailable'] = $model->quantityAvailable($product['id'], $product['quantity']);
  }
    return view('products/index_manager', $data);
  }

  public function new($association_id = null)
  {
    helper(['form']);
    $userId = session()->get('id'); // get the ID of the currently logged-in user from the session
    // Load the user model
    $association_model = new AssociationModel();
    $associationId = $association_model->getUserWithAssociation($userId);
    $data['association_id'] = $associationId;

    return view('products/new', $data);
  }

  public function create()
  {
    helper(['form']);
    $data = [];
    $session = session();

    $rules = [
      'name' => 'required|max_length[255]',
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

      $image = $this->request->getFile('image');

      if ($image->isValid() && !$image->hasMoved()) {
        $config = [
            'upload_path' => './uploads/products/',
            'allowed_types' => 'gif|jpg|jpeg|png',
            'max_size' => 2048,
            'encrypt_name' => true,
        ];

        if ($image->move($config['upload_path'], $image->getName())) {
            $imagePath = $image->getName();
            $data['image'] = $imagePath;
        } else {
            $error = $image->getErrorString();
            return redirect()->back()->with('error', 'Errore nel caricamento dell\'immagine: ' . $error);
        }
      }

      $model->save($data);
      return redirect()->to('/store-manager')->with('success', 'Prodotto inserito.');
    } else {
      $data['association_id'] = $this->request->getPost('association_id');
      $data['validation'] = $this->validator;
      echo view('products/new', $data);
    }
  }

  public function show($id) {
    $productModel = new ProductModel();
    $product = $productModel->find($id);

    if (!$product) {
      // Product not found, redirect or show error message
      return redirect()->to('store')->with('error', 'Product not found');
    }

    // Check if the quantity is available
    $quantityAvailable = $productModel->quantityAvailable($id, $product['quantity']);

    $data['product'] = $product;
    $data['quantityAvailable'] = $quantityAvailable;

    $userId = session()->get('id');

    $products = $productModel->getCartProductsByUserIdAndProductId($userId, $id);

    $productsBookedCount = count($products);

    $data['productsBookedCount'] = $productsBookedCount;

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

    $image = $this->request->getFile('image');

    if ($image->isValid()) {
      $config = [
        'upload_path' => './uploads/products/',
        'allowed_types' => 'gif|jpg|jpeg|png',
        'max_size' => 2048,
        'encrypt_name' => true,
      ];

      if ($image->move($config['upload_path'])) {
        $imagePath = $image->getName();
        $data['image'] = $imagePath;
      } else {
        $error = $image->getErrorString();
        return redirect()->back()->with('error', 'Errore nel caricamento dell\'immagine: ' . $error);
      }
    }

    $productModel->update($product['id'], $data);

    $session->setFlashdata('success', 'Informazioni aggiornate.');

    return redirect()->to('/product/detail/'.$product['id']);
  }

  public function buy()
  {
    helper('url');
    helper('email_helper');
    // Load the ProductModel and OrderModel
    $productModel = new ProductModel();
    $orderModel = new OrderModel();
    $userModel = new UserModel();
    $associationModel = new AssociationModel();

    // Get the logged-in user's ID
    $userId = session()->get('id');
    $associationId = $this->request->getVar('association_id');

    $userData = $userModel->find($userId);
    $associationData = $associationModel->find($associationId);

    $platformId = $associationData['user_id'];
    $platformManager = $userModel->find($platformId);

    // Get the submitted form data
    $productId = $this->request->getPost('product_id');
    $quantity = $this->request->getPost('quantity');

    $productData = $productModel->find($productId);

    // Example: Save the order details to the "orders" table
    $data = [
      'user_id' => $userId,
      'product_id' => $productId,
      'quantity' => $quantity,
      'date' => date('Y-m-d H:i:s')
    ];

    $orderModel->insert($data);

    $firstName = $userData['first_name'];
    $email = $userData['email'];
    $to = $email;
    $subject = 'Conferma Prenotazione Prodotto';

    $viewName = 'book_product'; // This should match the name of your view file without the file extension
    $titleProduct = $productData['name'];
    $data = [
      'firstName' => $firstName,
      'titleProduct' => $titleProduct,
      'quantity' => $quantity,
      'productName' => $productData['name'],
      'productPrice' => $productData['price'],
      'associationAddress' => $associationData['legal_address'],
      'nameAssociation' => $associationData['name'],
    ];

    sendMail($to, $subject, $viewName, $data);

    // platform manager
    $toManager = $platformManager['email'];
    $subjectManager = 'Prenotazione Prodotto';

    $viewNameManager = 'book_product_manager'; // This should match the name of your view file without the file extension
    $titleProduct = $productData['name'];
    $dataManager = [
      'firstName' => $firstName,
      'titleProduct' => $titleProduct,
      'userEmail' => $userData['email'],
      'quantity' => $quantity,
      'productName' => $productData['name'],
      'productPrice' => $productData['price'],
      'associationAddress' => $associationData['legal_address'],
      'nameAssociation' => $associationData['name'],
    ];
    sendMail($toManager, $subjectManager, $viewNameManager, $dataManager);

    // Redirect to a success page or perform further actions
    return redirect()->to('product/detail/' . $productId)->with(
      'success',
      "Prenotazione effettuata."
    );;
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

  public function cartProducts()
  {
    $productModel = new ProductModel();
    $associationModel = new AssociationModel();

    $userId = session()->get('id');
    $products = $productModel->findAll();

    $data = [];
    if (!empty($products)) {
        foreach ($products as $product) {
            $bookedCount = $productModel->getBookedProductCount($userId, $product['id']);
            
            if ($bookedCount > 0) {
                $product['bookedCount'] = $bookedCount;
                $data['products'][] = $product;
            }
        }
    }

    return view('products/cart_products', $data);
  }
}
