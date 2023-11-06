<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\EventModel;
use App\Models\ParticipantModel;
use App\Models\ProductModel;
use App\Models\AssociationModel;
use App\Models\OrderModel;

class ProductsController extends Controller
{

  public function index()
  {
    $model = new ProductModel();
    $data['products'] = $model->findAll();

    return view('admin/products/index', $data);
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
      return redirect()->to('/store')->with('success', 'Prodotto inserito.');
    } else {
      $data['association_id'] = $this->request->getPost('association_id');
      $data['validation'] = $this->validator;
      echo view('products/new', $data);
    }
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

    return redirect()->to('/admin/products');
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
    return redirect()->to('/admin/products')->with('success', 'Prodotto cancellato.');
  }
}
