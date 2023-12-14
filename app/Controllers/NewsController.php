<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\NewModel;

class NewsController extends BaseController
{
  public function edit($id)
  {
    $newModel = new newModel();
    $new = $newModel->where('id', $id)->first();

    if (!$new) {
      return redirect()->to('/news')->with('error', 'Avviso non trovato.');
    }

    $data['new'] = $new;

    return view('news/edit', $data);
  }

  public function update()
  {
    $session = session();
    $newModel = new NewModel();
    $newId = $this->request->getVar('new_id');
    $associationId = $this->request->getVar('association_id');
    $new = $newModel->find($newId);

    if (!$new) {
        return redirect()->to('/news')->with('error', 'Avviso non trovato.');
    }

    $data = [
        'description' => $this->request->getVar('description'),
    ];

    $newModel->update($newId, $data);

    $session->setFlashdata('success', 'Informazioni aggiornate.');

    return redirect()->to('/associations/' . $associationId);
  }


  public function create()
  {
    return view('news_form');
  }

  public function store()
  {
    $newsModel = new NewModel();

    $data = [
      'association_id' => $this->request->getPost('association_id'),
      'description' => $this->request->getPost('description'),
      'created_at' => date('Y-m-d H:i:s'),
    ];

    $newsModel->insert($data);

    // Redirect after storing the news
    return redirect()->to('/associations/'.$data['association_id'])->with('success', 'Avviso aggiunto.');
  }

  public function delete($newId)
  {
    // Create instances of the EventModel and ParticipantModel
    $newModel = new NewModel();

    // Find the event by its ID
    $new = $newModel->find($newId);

    if (!$new) {
        // Event not found, redirect or show an error message
        return redirect()->back()->with('error', 'Avviso non trovato.');
    }

    // Delete the event
    $newModel->delete($newId);

    // Redirect or show a success message
    return redirect()->to('/associations/'.$new['association_id'])->with('success', 'Avviso cancellato.');
  }
}
