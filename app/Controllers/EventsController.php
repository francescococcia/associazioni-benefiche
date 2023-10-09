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
    $model = new EventModel();
    $userId = session()->get('id');

    if(session()->get('isPlatformManager')){
      $data['events'] = $model->getAllEventsByPlatformManager($userId);
    } else {
      $data['events'] = $model->orderBy('id', 'DESC')->findAll();
    }

    $participantModel = new ParticipantModel();

    // Loop through the events and check if the user has participated in each event
    foreach ($data['events'] as &$event) {
      $participant = $participantModel->where('user_id', $userId)->where('event_id', $event['id'])->first();
      $event['userParticipated'] = $participant !== null;
    }

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

        $data = [
          'association_id' => $this->request->getPost('association_id'),
          'title' => $this->request->getPost('title'),
          'category' => $this->request->getPost('category'),
          'description' => $this->request->getPost('description'),
          'date' => $this->request->getPost('date'),
          'location' => $this->request->getPost('location'),
        ];

        $model->save($data);
        $session->setFlashdata('message', 'Evento inserito');
        return redirect()->to('/events');
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
    $event = $model->find($id);

    if (!$event) {
      // Event not found, redirect or show error message
      return redirect()->to('events')->with('error', 'Evento non trovato');
    }

    $participantId = $model->getIdParticipant($id);
    $data['event'] = $event;
    $data['participantId'] = $participantId;

    //
    $userId = session()->get('id');

    if(session()->get('isPlatformManager')){
      $data['events'] = $model->getAllEventsByPlatformManager($userId);
    } else {
      $data['events'] = $model->orderBy('id', 'DESC')->findAll();
    }

    $participantModel = new ParticipantModel();

    // Loop through the events and check if the user has participated in each event
    // foreach ($data['events'] as &$event) {
      $participant = $participantModel->where('user_id', $userId)->where('event_id', $event['id'])->first();
      $event['userParticipated'] = $participant !== null;
    // }
    $data['participantModel'] = $participant;

    // Get all feedback related to the event

    $participants = $participantModel->where('event_id', $id)->findAll();

    $feedbackModel = new FeedbackModel(); // Replace with your actual Feedback model
    $feedbackData = [];
    // Get the user's first name and last name based on the feedback's user_id
    $userModel = new UserModel();
    $feedback = [''];
    foreach ($participants as $participant) {
        $feedback = $feedbackModel->where('participant_id', $participant['id'])->findAll();
        if (!empty($feedback)) {
            $feedbackData[$participant['id']] = $feedback;
        }
    }

    // $userData = $userModel->user($feedback['user_id']);

    // Pass the feedback and user data to the view
    $data['feedback'] = $feedback;

    $data['feedbackData'] = $feedbackData;

    //
    return view('events/show', $data);
  }

  public function edit($id)
  {
    $eventModel = new EventModel();
    $event = $eventModel->where('id', $id)->first();

    if (!$event) {
      return redirect()->to('/events')->with('error', 'Evento non trovato');
    }

    $formattedDate = date('Y-m-d', strtotime($event['date']));
    $data['event'] = $event;
    $data['formattedDate'] = $formattedDate;

    return view('events/edit', $data);
  }

  public function update()
  {
    $session = session();
    $eventModel = new EventModel();
    $eventId = $this->request->getVar('event_id');
    $event = $eventModel->where('id', $eventId)->first();

    if (!$event) {
      return redirect()->to('/events')->with('error', 'Evento non trovato');
    }

    $data = [
      'title' => $this->request->getVar('title'),
      'category' => $this->request->getVar('category'),
      'description' => $this->request->getVar('description'),
      'date' => $this->request->getVar('date'),
      'location' => $this->request->getVar('location'),
    ];

      $eventModel->update($event['id'], $data);

      $session->setFlashdata('success', 'Informazioni aggiornate.');

    return redirect()->to('/events/edit/'.$event['id']);
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
