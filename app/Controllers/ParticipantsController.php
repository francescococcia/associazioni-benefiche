<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\ParticipantModel;
use CodeIgniter\Controller;


class ParticipantsController extends Controller
{
  public function index()
  {
    // Fetch all participants
    $model = new ParticipantModel();
    $data['participants'] = $model->findAll();

    // Pass participants data to view
    return view('participants/index', $data);
  }

  // public function create()
  // {
  //   $eventId = $this->request->getPost('event_id');
  //   $userId = session()->get('id');
  //   $model = new ParticipantModel();

  //   $data = [
  //     'event_id' => $eventId,
  //     'user_id' => $userId,
  //     'created_at' => date('Y-m-d H:i:s')
  //   ];
  //   $session = session();
  //   $session->setFlashdata('success', 'Your message here');
  //   $data['session'] = $session;
  //   $model->insert($data);

  //   return redirect()->to('events/');
  // }
  
  public function create()
{
    // Check if the user is logged in, if not, redirect to the login page or show an error message
    // if (!logged_in()) {
    //     // Redirect to the login page or show an error message
    //     return redirect()->to('login');
    // }

    // Get the event ID and user ID from the form submission
    $eventId = $this->request->getPost('event_id');
    $userId = session()->get('id'); // Assuming you have a helper function to retrieve the logged-in user's ID

    // Create an instance of the ParticipantModel
    $participantModel = new ParticipantModel();

    // Prepare the data to be inserted into the participants table
    $data = [
        'event_id' => $eventId,
        'user_id' => $userId,
        'created_at' => date('Y-m-d H:i:s')
    ];

    // Insert the data into the participants table
    $participantModel->insert($data);

    // Optionally, you can show a success message or redirect to a confirmation page
    // For example, redirect to the event details page
    return redirect()->to('events/detail/' . $eventId);
}
}
