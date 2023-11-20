<?php

namespace App\Controllers;

use App\Models\FeedbackModel;

class FeedbacksController extends BaseController
{
  public function create()
  {
    helper(['form']);
    $participantId = $_GET['participant_id'];
    $data['participantId'] = $participantId;
    return view('feedbacks/index',  $data);
  }

  public function store($participantId)
  {
    helper(['form']);
    $session = session();
    // Create a new instance of the FeedbackModel
    $feedbackModel = new FeedbackModel();
    $userId = session()->get('id');

    $rules = [
      'title' => 'required|max_length[255]',
      'message' => 'required|max_length[255]',
      'rating' => 'required',
    ];

    if ($this->validate($rules)) {
      // Prepare the data to be inserted
      $data = [
        'user_id' => $userId,
        'rating' => $this->request->getPost('rating'),
        'message' => $this->request->getPost('message'),
        'title' => $this->request->getPost('title'),
        'participant_id' => $participantId,
        'created_at' => date('Y-m-d H:i:s')
      ];

      // Insert the data into the database
      $feedbackModel->insert($data);

      $session->setFlashdata('success', 'Feedback inviato.');

      // Redirect back to the current page
      return redirect()->back();
    } else {
      $session->setFlashdata('error', 'Compila tutti i campi del form.');
      return redirect()->back();
    }
  }

  public function delete($id)
  {
    // Create instances of the EventModel and ParticipantModel
    $feedbackModel = new FeedbackModel();

    // Find the event by its ID
    $feedback = $feedbackModel->find($id);
    $eventId = $this->request->getVar('event_id');

    if (!$feedback) {
        // Event not found, redirect or show an error message
        return redirect()->back()->with('error', 'Feedback non trovato.');
    }

    // Delete the event
    $feedbackModel->delete($id);

    // Redirect or show a success message
    return redirect()->to('/event/detail/'.$eventId)->with('success', 'Feedback cancellato.');
  }
}
