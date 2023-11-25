<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\ParticipantModel;
use App\Models\UserModel;
use App\Models\AssociationModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;


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

    $today = Time::now();

  // Data dell'evento (presumo che $eventData['date'] sia una stringa nel formato 'Y-m-d')
  $dataEventoTimestamp = Time::parse($eventData['date']);

  // Data fine (se disponibile)
  $dataFine = null;
  if ($eventData['date_to']) {
      $dataFine = Time::parse($eventData['date_to']);
  }

  // Confronta le date
  if ($dataEventoTimestamp < $today) {
      return redirect()->to('/event/detail/' . $eventData['id'])->with('error', "Impossibile partecipare all'evento perchè è passato.");
  }elseif ($dataFine !== null && ($dataEventoTimestamp <= $dataFine) && $dataFine < $dataOdiernaTimestamp) {
      return redirect()->to('/event/detail/'. $eventData['id'])->with('error', "Impossibile partecipare all'evento perchè è passato.");
    }

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
    helper('email_helper');
    $userModel = new UserModel();
    $eventModel = new EventModel();
    $participantModel = new ParticipantModel();
    $associationModel = new AssociationModel();

    $userId = session()->get('id');

    $userData = $userModel->find($userId);
    $eventData = $eventModel->find($eventId);

    $associationId = $eventData['association_id'];
    $associationData = $associationModel->find($associationId);
    $platformId = $associationData['id'];
    $titleEvent = $eventData['title'];
    $platformManager = $userModel->find($platformId);

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

    // platform manager
    $firstName = $userData['first_name'];
    $toManager = $platformManager['email'];
    $subjectManager = 'Partecipazione Evento rimossa';

    $viewNameManager = 'Layout/template/remove_participant_event_manager'; // This should match the name of your view file without the file extension
    // $titleEvent = $eventData['title'];
    $dataManager = [
      'firstName' => $firstName,
      'titleEvent' => $titleEvent,
      'userEmail' => $userData['email'],
      'nameAssociation' => $associationData['name'],
    ];
    sendMail($toManager, $subjectManager, $viewNameManager, $dataManager);

    return redirect()->to('event/detail/'.$eventId)->with('success', 'Prenotazione annullata.');
  }
}
