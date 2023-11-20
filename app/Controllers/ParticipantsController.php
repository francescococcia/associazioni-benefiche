<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\ParticipantModel;
use App\Models\UserModel;
use App\Models\AssociationModel;
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


  public function create()
  {
    helper(['form']);
    helper('email_helper');

    // Get the event ID and user ID from the form submission
    $eventId = $this->request->getPost('event_id');
    $userId = session()->get('id'); // Assuming you have a helper function to retrieve the logged-in user's ID

    $userModel = new UserModel();
    $eventModel = new EventModel();
    $participantModel = new ParticipantModel();
    $associationModel = new AssociationModel();

    $userData = $userModel->find($userId);
    $eventData = $eventModel->find($eventId);

    $associationId = $eventData['association_id'];
    $associationData = $associationModel->find($associationId);
    $platformId = $associationData['id'];
    $platformManager = $userModel->find($platformId);

    // Prepare the data to be inserted into the participants table
    $data = [
        'event_id' => $eventId,
        'user_id' => $userId,
        'created_at' => date('Y-m-d H:i:s')
    ];

    // Insert the data into the participants table
    $participantModel->insert($data);

    $firstName = $userData['first_name'];
    $email = $userData['email'];
    $to = $email;
    $subject = 'Conferma Prenotazione Evento';

    $viewName = 'participant_event'; // This should match the name of your view file without the file extension
    $titleEvent = $eventData['title'];
    $data = [
      'firstName' => $firstName,
      'titleEvent' => $titleEvent,
    ];

    sendMail($to, $subject, $viewName, $data);

    // platform manager
    $toManager = $platformManager['email'];
    $subjectManager = 'Prenotazione Evento';

    $viewNameManager = 'participant_event_manager'; // This should match the name of your view file without the file extension
    // $titleEvent = $eventData['title'];
    $dataManager = [
      'firstName' => $firstName,
      'titleEvent' => $titleEvent,
      'userEmail' => $userData['email'],
      'nameAssociation' => $associationData['name'],
    ];
    sendMail($toManager, $subjectManager, $viewNameManager, $dataManager);

    // Optionally, you can show a success message or redirect to a confirmation page
    // For example, redirect to the event details page
    return redirect()->to('event/detail/' . $eventId);
  }

  public function delete($eventId)
  {
    $participantModel = new ParticipantModel();

    $userId = session()->get('id');

    // Check if the user has a reservation for the specified event
    $participantEvent = $participantModel->where('event_id', $eventId)
                                         ->where('user_id', $userId)
                                         ->first();

    // Check if the reservation exists
    if (!$participantEvent) {
        return redirect()->back()->with('error', 'Prenotazione non trovata.');
    }

    // Delete the reservation
    $participantModel->delete($participantEvent['id']);

    return redirect()->to('event/detail/'.$eventId)->with('success', 'Prenotazione annullata.');
  }
}
