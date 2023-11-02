<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\EventModel;
use App\Models\AssociationModel;
use App\Models\ParticipantModel;
use App\Models\FeedbackModel;
use CodeIgniter\Controller;

class EventsController extends Controller
{
  public function index()
  {
    helper('date');
    $eventModel = new EventModel();
    $userId = session()->get('id');

    $category = $this->request->getVar('category');


    if(session()->get('isPlatformManager') && $category == ''){
      $data['events'] = $eventModel->getAllEventsByPlatformManager($userId);
    } else if($category != ''){
      $data['events'] = $eventModel->like('category', $category)->orderBy('id', 'DESC')->findAll();
    } else {
      $data['events'] = $eventModel->orderBy('id', 'DESC')->findAll();
    }

    $participantModel = new ParticipantModel();

    // Loop through the events and check if the user has participated in each event
    foreach ($data['events'] as &$event) {
      $participant = $participantModel->where('user_id', $userId)->where('event_id', $event['id'])->first();
      $event['userParticipated'] = $participant !== null;
    }

    $data['category'] = $category;

    return view('events/index', $data);
  }

  public function new($association_id = null)
  {
    helper(['form']);
    $userId = session()->get('id'); // get the ID of the currently logged-in user from the session
    // Load the user model
    $association_model = new AssociationModel();
    $associationId = $association_model->getUserWithAssociation($userId);
    $data['association_id'] = $associationId;

    echo view('events/new', $data);
  }

  public function create()
  {
    helper(['form']);
    $data = [];
    $session = session();
    $userId = session()->get('id');
    $association_model = new AssociationModel();
    $associationId = $association_model->getUserWithAssociation($userId);
    $data['association_id'] = $associationId;

    if ($this->request->getMethod() == 'post') {
      $rules = [
        'title' => 'required|max_length[255]',
        'category' => 'required',
        'description' => 'required',
        'date' => 'required',
        'location' => 'required'
      ];

      if ($this->validate($rules)) {
        $model = new EventModel();

        $file = $this->request->getFile('image');

        if ($file && $file->isValid()) {
          // Configure the upload settings
          $config = [
            'upload_path' => './uploads/events/',
            'allowed_types' => 'gif|jpg|jpeg|png',
            'max_size' => 2048, // Maximum file size in kilobytes
            'encrypt_name' => true, // Encrypt the uploaded file name
          ];

          // Create the upload directory if it doesn't exist
          if (!is_dir($config['upload_path'])) {
              mkdir($config['upload_path'], 0777, true);
          }

          // Move the uploaded file to the destination directory
          $uniqueId = uniqid(); // You can use any method to generate a unique identifier

          if ($file->move($config['upload_path'], $uniqueId . '_' . $file->getRandomName())) {

            $filename = $file->getName();
            // Save the image path to the database

            $data = [
              'association_id' => $this->request->getPost('association_id'),
              'title' => $this->request->getPost('title'),
              'category' => $this->request->getPost('category'),
              'description' => $this->request->getPost('description'),
              'date' => $this->request->getPost('date'),
              'location' => $this->request->getPost('location'),
              'date_to' => $this->request->getPost('date_to'),
              'link' => $this->request->getPost('link'),
              'image' => $filename,
            ];
            $model->save($data);
            return redirect()->to('/events')->with('success','Evento inserito.');
          } else {
            // File upload failed
            $error = $image->getErrorString();
            // Handle the error
            return redirect()->back()->with('error', 'Errore nel caricamento dell\'immagine: ' . $error);
          }
        } else {
          // No image uploaded
          $data = [
            'association_id' => $this->request->getPost('association_id'),
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'date' => $this->request->getPost('date'),
            'location' => $this->request->getPost('location'),
            'date_to' => $this->request->getPost('date_to'),
            'link' => $this->request->getPost('link'),
          ];
          $model->save($data);
          return redirect()->to('/events')->with('success','Evento inserito.');
        }
      } else {
          $data['validation'] = $this->validator;
          echo view('events/new', $data);
      }
    }
  }

  public function show($id)
  {
    helper('event_helper');
    $model = new EventModel();
    $participantModel = new ParticipantModel();
    $feedbackModel = new FeedbackModel();
    // Get the user's first name and last name based on the feedback's user_id
    $userModel = new UserModel();

    $event = $model->find($id);

    if (!$event) {
      // Event not found, redirect or show error message
      return redirect()->to('events')->with('error', 'Evento non trovato');
    }

    $participantId = $model->getIdParticipant($id);
    $data['event'] = $event;
    $data['participantId'] = $participantId;

    $userId = session()->get('id');

    if(session()->get('isPlatformManager')){
      $data['events'] = $model->getAllEventsByPlatformManager($userId);
    } else {
      $data['events'] = $model->orderBy('id', 'DESC')->findAll();
    }

    // Loop through the events and check if the user has participated in each event
    $participant = $participantModel->where('user_id', $userId)->where('event_id', $event['id'])->first();
    $event['userParticipated'] = $participant !== null;
    $data['participantModel'] = $participant;
    $data['userId'] = $userId;

    // Get all feedback related to the event

    $participants = $participantModel->where('event_id', $id)->findAll();

    $feedbackData = [];

    $feedback = [''];
    foreach ($participants as $participant) {
      $feedback = $feedbackModel->where('participant_id', $participant['id'])->findAll();
      if (!empty($feedback)) {
          $feedbackData[$participant['id']] = $feedback;
      }
    }

    // Pass the feedback and user data to the view
    $data['feedback'] = $feedback;

    $data['feedbackData'] = $feedbackData;

    $date = strtotime($event['date']);
    $formattedDate = date('d/m/Y H:i', $date);
    $data['formattedDate'] = $formattedDate;

    $date_to = strtotime($event['date_to']);
    $formattedDateTo = date('d/m/Y H:i', $date_to);
    $data['formattedDateTo'] = $formattedDateTo;

    return view('events/show', $data);
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

    $eventModel->update($eventId, $data);

    $session->setFlashdata('success', 'Informazioni aggiornate.');

    return redirect()->to('/events/detail/' . $eventId);
  }

  public function search()
  {
    $events = []; // Initialize the $events array
    $category = $this->request->getVar('category');

    $eventModel = new EventModel();
    if($category != ''){
      $events = $eventModel->like('category', $category)->findAll();
    }

    $data['events'] = $events;
    $data['category'] = $category;
    return view('events/search', $data);
  }

  public function joinedEvents()
  {
    $eventModel = new EventModel();

    // Assuming you have a function to retrieve the current user's ID
    $userId = session()->get('id'); // Replace this with the actual method to get user ID
    $joinedEvents = $eventModel->getJoinedEventsByUserId($userId);

    $data['joinedEvents'] = $joinedEvents;

    // Pass the data to the view
    return view('events/joined_events', $data);
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
    return redirect()->to('/events')->with('success', 'Evento cancellato.');
  }
}
