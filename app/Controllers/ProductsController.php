<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EventModel;
use App\Models\ParticipantModel;
use App\Models\ProductModel;
use App\Models\AssociationModel;

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

  // public function create()
  // {
  //     $model = new ProductModel();
  //     $data = $this->request->getJSON();
  //     if ($model->insert($data)) {
  //         $response = [
  //             'status' => 201,
  //             'error' => null,
  //             'message' => [
  //                 'success' => 'Product created successfully'
  //             ]
  //         ];
  //         return $this->respondCreated($response);
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

  // public function show($id = null)
  // {
  //     $model = new ProductsModel();
  //     $data = $model->find($id);
  //     return $this->respond($data);
  // }

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
