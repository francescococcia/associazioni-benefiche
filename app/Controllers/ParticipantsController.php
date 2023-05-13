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

  public function create()
  {
    $eventId = $this->request->getPost('event_id');
    $userId = session()->get('id');
    $model = new ParticipantModel();

    $data = [
      'event_id' => $eventId,
      'user_id' => $userId,
      'created_at' => date('Y-m-d H:i:s')
    ];
    $session = session();
    $session->setFlashdata('success', 'Your message here');
    $data['session'] = $session;
    $model->insert($data);

    return redirect()->to('events/');
  }
}
