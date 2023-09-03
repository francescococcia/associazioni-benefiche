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
    $data['session'] = $associationId;
    echo view('events/new', ['association_id' => $associationId]);
  }

  public function create()
  {
    $data = [];
    $session = session();

    if ($this->request->getMethod() == 'post') {
      $rules = [
        'title' => 'required|min_length[3]|max_length[255]',
        'description' => 'required',
        'date' => 'required',
        'location' => 'required'
      ];

      if ($this->validate($rules)) {
        $model = new EventModel();

        $data = [
            'association_id' => $this->request->getPost('association_id'),
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'date' => $this->request->getPost('date'),
            'location' => $this->request->getPost('location'),
        ];

        $model->save($data);
        $session->setFlashdata('message', 'Event created successfully!');
        return redirect()->to('/events');
      } else {
        $data['validation'] = $this->validator;
      }
    }
    $data = $session->get();
    $session->setFlashdata('msg', 'Errors.');
    return view('events/new', $data);
  }

  public function view($id = null)
  {
    $model = new EventModel();
    $data['event'] = $model->getEventById($id);

    if (empty($data['event']))
    {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the event item: ' . $id);
    }

    return view('events/view', $data);
  }

  public function show($id)
  {
    $model = new EventModel();
    $event = $model->find($id);

    if (!$event) {
      // Event not found, redirect or show error message
      return redirect()->to('events')->with('error', 'Event not found');
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

    $participantModel = new ParticipantModel();
    $participants = $participantModel->where('event_id', $id)->findAll();

    $feedbackModel = new FeedbackModel(); // Replace with your actual Feedback model
    $feedbackData = [];
    // Get the user's first name and last name based on the feedback's user_id
    $userModel = new UserModel();
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

  public function search()
  {
    return view('events/search');
  }

  public function results()
  {
    $description = $this->request->getVar('description');

    $eventModel = new EventModel();
    if($description != ''){
      $events = $eventModel->like('description', $description)->findAll();
    }

    $data['events'] = $events;
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
}
