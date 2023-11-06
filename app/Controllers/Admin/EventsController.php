<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EventModel;
use App\Models\ParticipantModel;

class EventsController extends BaseController
{
  public function index()
  {
    $eventModel = new EventModel();
    $data['events'] = $eventModel->findAll();

    return view('admin/events/index', $data);
  }
  
  public function edit($id)
  {
    $eventModel = new EventModel();
    $event = $eventModel->where('id', $id)->first();

    if (!$event) {
      return redirect()->to('/events')->with('error', 'Evento non trovato');
    }

    $data['event'] = $event;

    $date = strtotime($event['date']);
    $formattedDate = date('Y-m-d\TH:i', $date);
    $data['formattedDate'] = $formattedDate;

    $date_to = strtotime($event['date_to']);
    $formattedDateTo = date('Y-m-d\TH:i', $date_to);
    $data['formattedDateTo'] = $formattedDateTo;

    return view('events/edit', $data);
  }

  public function update()
  {
    $session = session();
    $eventModel = new EventModel();
    $eventId = $this->request->getVar('event_id');
    $event = $eventModel->find($eventId);

    if (!$event) {
      return redirect()->to('/events')->with('error', 'Evento non trovato');
    }

    $data = [
      'title' => $this->request->getVar('title'),
      'category' => $this->request->getVar('category'),
      'description' => $this->request->getVar('description'),
      'date' => $this->request->getVar('date'),
      'location' => $this->request->getVar('location'),
      'date_to' => $this->request->getVar('date_to'),
      'link' => $this->request->getVar('link'),
    ];

    $image = $this->request->getFile('image');

    if ($image->isValid()) {
      $config = [
        'upload_path' => './uploads/events/',
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

    if (strtotime($data['date']) >= strtotime($data['date_to'])) {
      // The date_to is less than or equal to the date, indicating an error
      $error = 'La data di fine deve essere maggiore della data di inizio';
      return redirect()->back()->with('error', $error);
    } else {
        // Perform the action when the date_to is greater than the date
        $eventModel->update($eventId, $data);
        $session->setFlashdata('success', 'Informazioni aggiornate.');
        return redirect()->to('/admin/events');
    }

  }

  public function delete($eventId)
  {
    // Create instances of the EventModel and ParticipantModel
    $eventModel = new EventModel();
    $participantModel = new ParticipantModel();

    // Find the event by its ID
    $event = $eventModel->find($eventId);

    // Check if the event exists
    if (!$event) {
        // Event not found, redirect or show an error message
        return redirect()->back()->with('error', 'Evento non trovato.');
    }

    // Delete the associated participants
    $participantModel->where('event_id', $eventId)->delete();

    // Delete the event
    $eventModel->delete($eventId);

    // Redirect or show a success message
    return redirect()->back()->with('success', 'Evento rimosso.');
  }
}
